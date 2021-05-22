<?php

namespace App\Http\Controllers\Teacher;

use App\Exports\TimetableExport;
use App\Http\Controllers\Controller;
use App\Models\Group_subject;
use App\Models\Group_user;
use App\Models\Raiting;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function index()
    {
        $students = User::where('role', 3)->get();

        return view('teacher.index', compact('students'));
    }

    public function all_student(Request $request)
    {
        if ($request->group_id == null)
            $student = DB::table('group_subjects')
                ->select('group_subjects.group_id', 'group_users.user_id')
                ->join('group_users', 'group_users.group_id', '=', 'group_subjects.group_id')
                ->where(['group_subjects.user_id' => Auth::id()])
                ->get();
        else {
            $student = DB::table('group_subjects')
                ->select('group_subjects.group_id', 'group_users.user_id')
                ->join('group_users', 'group_users.group_id', '=', 'group_subjects.group_id')
                ->where(['group_subjects.user_id' => Auth::id(), 'group_users.group_id' => $request->group_id])
                ->get();
            $group_id = $request->group;
            return view('teacher.all_student', compact('student', 'group_id'));
        }
        return view('teacher.all_student', compact('student'));
    }

    public function teacher_group()
    {
        $group = Group_subject::where('user_id', Auth::id())->get();
            return view('teacher.teacher_group', compact('group'));
    }

    public function marked($group)
    {
        $sub_id = Group_subject::where(['user_id' => Auth::id(), 'group_id' => $group])->get()[0]->id;

        $group_student = DB::table('group_subjects')
            ->select('group_subjects.group_id', 'group_users.user_id')
            ->join('group_users', 'group_users.group_id', '=', 'group_subjects.group_id')
            ->where(['group_subjects.group_id' => $group, 'group_subjects.user_id' => Auth::id(), 'group_subjects.subject_id' => $sub_id])
            ->get();

        $raiting = DB::table('raitings')
            ->select('group_subjects.id as group_sub_id', 'raitings.user_id', 'raitings.mark', 'raitings.is_come', 'raitings.lesson_datetime')
            ->join('group_subjects', 'group_subjects.id', '=', 'raitings.group_subject_id')
            ->whereDate('raitings.lesson_datetime', DB::raw('CURDATE()'))
            ->where(['group_subjects.user_id' => Auth::id(), 'group_subjects.group_id' => $group]);

        if (count($raiting->get()) == 0)
            foreach ($group_student as $groups) {
                Raiting::create([
                    'user_id' => $groups->user_id,
                    'lesson_datetime' => Carbon::now(),
                    'is_come' => true,
                    'group_subject_id' => $sub_id,
                    'mark' => null,
                    'group_id' => $group
                ]);
            }

        $raiting_user = Raiting::select('user_id')->where(['group_subject_id' => $sub_id])->get();
        $group_users = Group_user::select('user_id')->where('group_id', $group)->get();
        $raiting_user_id = [];
        $group_user_id = [];
        foreach ($raiting_user as $r) {
            array_push($raiting_user_id, $r->user_id);
        }
        foreach ($group_users as $g) {
            array_push($group_user_id, $g->user_id);
        }

        $user_diff = array_diff($group_user_id, $raiting_user_id);
        if (count($user_diff) > 0) {
            foreach ($user_diff as $user) {
                Raiting::create([
                    'user_id' => $user,
                    'group_subject_id' => $sub_id,
                    'lesson_datetime' => Carbon::now(),
                    'is_come' => true,
                    'mark' => null,
                    'group_id' => $group
                ]);
            }
        }
        $raiting = $raiting->get();
        return view('teacher.marked', compact('raiting', 'group'));
    }

    public function marked_store_update(Request $request, $group): RedirectResponse
    {
        $data = $request->all();
        for ($i = 0; $i < count($data['user_id']); $i++) {
            $raiting = Raiting::where(['user_id' => $data['user_id'][$i], 'group_subject_id' => $data['group_id'][$i]])
                ->whereDate('lesson_datetime', DB::raw('CURDATE()'))->first();
            $raiting->mark = $data['mark'][$i];
            $raiting->is_come = $data['is_come'][$i];
            $raiting->group_subject_id = $data['group_id'][$i];
            $raiting->lesson_datetime = Carbon::now();
            $raiting->group_id = $group;
            $raiting->save();
        }
        return redirect()->route('teacher.teacher_group')
            ->with('success', " successfully updated");
    }

    public function teacher_timetable(Request $request)
    {

        if ($request->ajax()) {
            $search_date = DB::table('timetables')
                ->select('group_subjects.group_id', 'timetables.week_day', 'timetables.lesson_time', 'groups.name as groupName')
                ->join('group_subjects', 'group_subjects.id', '=', 'timetables.group_subject_id')
                ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
                ->where(['group_subjects.user_id' => Auth::id(), 'timetables.week_day' => $request->day])
                ->get();
            return response()->json($search_date);
        }

        $today_timetable = DB::table('timetables')
            ->select('group_subjects.group_id', 'timetables.week_day', 'timetables.lesson_time', 'groups.name as groupName')
            ->join('group_subjects', 'group_subjects.id', '=', 'timetables.group_subject_id')
            ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
            ->where(['group_subjects.user_id' => Auth::id(), 'timetables.week_day' => DB::raw('WEEKDAY(CURDATE())')])
            ->get();

        return view('teacher.teacher_timetable', compact('today_timetable'));
    }

    public function teacher_timetable_excel()
    {
        return Excel::download(new TimetableExport, 'users.xlsx');
    }

    public function teacher_timetable_pdf()
    {
        $today_timetable = DB::table('timetables')
            ->select('group_subjects.group_id', 'timetables.week_day', 'timetables.lesson_time', 'groups.name as groupName')
            ->join('group_subjects', 'group_subjects.id', '=', 'timetables.group_subject_id')
            ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
            ->where(['group_subjects.user_id' => Auth::id(), 'timetables.week_day' => DB::raw('WEEKDAY(CURDATE())')])
            ->get();
        $dompdf = new Dompdf();
        $html = file_get_contents('../resources/views/teacher/teacher_timetable_pdf.html');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream();
    }

    public function lang($locale)
    {
        App::setLocale($locale);
//        dd(\app()->getLocale());
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
