<?php
namespace App\Repositories;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function all(){
        return Subject::orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Subject::create($request->all());
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $subject->update($request->all());
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();
    }
}
