<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Group;
use App\Models\Group_subject;
use App\Models\Group_user;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\User;
use App\Repositories\GroupRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */

    private $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        $group = $this->groupRepository->all();

        return view('group.index', compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $teacher = $this->groupRepository->create();

        return view('group.create', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->groupRepository->store($request);
        return redirect()->route('admin.group.index')
            ->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @return Response
     */
    public function show(Group $group)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return Application|Factory|View|Response
     */
    public function edit(Group $group)
    {
        return view('group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function update(Request $request, Group $group): RedirectResponse
    {

        $this->groupRepository->updateId($request, $group);

        return redirect()->route('admin.group.index')
            ->with('success', "$request->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return RedirectResponse
     */
    public function destroy(Group $group)
    {
        $this->groupRepository->deleting($group);
        return redirect()->route('admin.group.index')
            ->with('success', "$group->name sucessfully deleted");
    }

    public function group_user(Group $group)
    {
        $not_in = DB::table("users")->select('*')
            ->whereNotIn('id',function($query) {
                $query->select('user_id')->from('group_users');
            })
            ->whereNotIn('role', [1,2])
            ->get();

        $users = $this->groupRepository->group_user($group);
        return view('group.group_user', compact('group', 'users', 'not_in'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function group_user_store(Request $request, Group $group): RedirectResponse
    {
        $this->groupRepository->group_user_store($request, $group);

        return redirect()->route('admin.group.index')
            ->with('success', "added new users successfully");
    }

    public function group_subject(Group $group)
    {
        $subject = Subject::get();

        $teacher = User::where('role', 2)->get();

        $group_subject = Group_subject::get();

        return view('group.group_subject',
            compact('group', 'subject', 'teacher', 'group_subject'));
    }

    public function group_subject_store(Request $request): RedirectResponse
    {
        $data = $request->all();
        for ($i = 0; $i < count($data['subject_id']); $i++) {
            $group_subject = new Group_subject;
            $group_subject->subject_id = $data['subject_id'][$i];
            $group_subject->user_id = $data['teacher_id'][$i];
            $group_subject->group_id = $data['group_id'];
            $group_subject->save();
        }
        return redirect()->route('admin.group.index')
            ->with('success', "added new subjects and teachers successfully");
    }

    public function group_timetable(Group $group)
    {
        $group_subject = Group_subject::where('group_id', $group->id)->get();
        $timetable = Timetable::get();
        $days = Timetable::week_day();

        return view('group.group_timetable', compact('group', 'group_subject', 'days', 'timetable'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function timetable_store(Request $request): RedirectResponse
    {
        $data = $request->all();
        for ($i = 0; $i < count($data['group_subject_id']); $i++) {
            $group_subject = new Timetable();
            $group_subject->group_subject_id = $data['group_subject_id'][$i];
            $group_subject->lesson_time = $data['lesson_time'][$i];
            $group_subject->week_day = $data['week_day'][$i];
            $group_subject->save();
        }
        return redirect()->route('admin.group.index')
            ->with('success', "added new subjects timetable successfully");
    }

    /**
     * @param Request $request
     * @param $group
     * @return RedirectResponse
     */
    public function bulk_insert(Request $request, $group): RedirectResponse
    {
        $data = $request->all();
        for ($i = 0; $i < count($data['user_id']); $i++) {
            if($data['is_check'][$i] == 1){
                $group_user = new Group_user();
                $group_user->user_id = $data['user_id'][$i];
                $group_user->group_id = $group;
                $group_user->save();
            }
        }
        return redirect()->route('admin.group.index')
            ->with('success', "added new users successfully");
    }
}
