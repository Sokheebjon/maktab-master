<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\AdminRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{

    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function teacher()
    {
        return view('admin.teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function teacher_store(Request $request)
    {
        $this->adminRepository->teacher_store($request);
        return ($request['role'] == 2) ? redirect()->route('admin.all_teacher')
            ->with('success', $request->name . " teacher sucessfully added") :
            redirect()->route('admin.all_student')
                ->with('success', "$request->name user sucessfully added");
    }

    public function all_teacher()
    {
        $teacher = $this->adminRepository->all_teacher();
        return view('admin.all_teacher', compact('teacher'));
    }

    public function student()
    {
        return view('admin.student');
    }

    public function all_student()
    {
        $student = $this->adminRepository->all_student();
        return view('admin.all_student', compact('student'));
    }

    public function update_profile(User $user)
    {
        return view('admin.update_profile', compact('user'));
    }

    public function change_profile(Request $request, User $user)
    {

        $student = $this->adminRepository->change_profile($request, $user);

        return view('admin.all_student', compact('student'));

    }

    public function destroy(User $user)
    {
        $this->adminRepository->deleting($user);

        return ($user['role'] == 2) ? redirect()->route('admin.all_teacher')
            ->with('success', $user->name . " teacher sucessfully deleted") :
            redirect()->route('admin.all_student')
                ->with('success', "$user->name user sucessfully deleted");
    }
}
