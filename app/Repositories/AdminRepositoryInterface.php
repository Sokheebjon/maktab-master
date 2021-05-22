<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface AdminRepositoryInterface
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function teacher_store(Request $request);

    public function all_teacher();

    public function all_student();

    public function change_profile(Request $request, User $user);

    public function deleting(User $user);
}
