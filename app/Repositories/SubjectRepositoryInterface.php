<?php

namespace App\Repositories;

use App\Models\Subject;
use Illuminate\Http\Request;

interface SubjectRepositoryInterface
{
    public function all();

    public function store(Request $request);

    public function update(Request $request, Subject $subject);

    public function destroy(Subject $subject);
}
