<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Test_title;
use App\Models\Type;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TestTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $test_title = Test_title::orderBy('id', 'desc')->get();

        return view('test-title.index', compact('test_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $type = Type::orderBy('id', 'desc')->get();
        $subjects = Subject::get();
        return view('test-title.create', compact('type', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'question.*' => 'required',
            'answer.*' => 'required'
        ]);
        dd($request->all());

        Test_title::create([
            'title_uz' => $request->title_uz,
            'user_id' => Auth::id(),
            'subject_id' => $request->subject_id,
        ]);

        for ($i = 0; $i < count($request->question); $i++) {
            Question::create([
                'question' => $request->question[$i],
                'test_title_id' => Test_title::all()->last()->id,
                'type_id' => $request->hidden_type[$i],
            ]);

            foreach ($request['answer'][$i] as $val => $ans){
                foreach ($request['is_check'][$i] as $val1 => $check){
                    if($val == $val1){
                        Answer::create([
                            'answer' => $ans,
                            'question_id' => Question::all()->last()->id,
                            'is_true' => $check
                        ]);
                    }
                }
            }
        }

        return redirect()->route("teacher.test-title.index")->with("message", "Yangi test qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param Test_title $test_title
     * @return Application|Factory|View|Response
     */
    public function show(Test_title $test_title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Test_title $test_title
     * @return Application|Factory|View|Response
     */
    public function edit(Test_title $test_title)
    {
        $type = Type::orderBy('id', 'desc')->get();
        $subjects = Subject::get();

        $questions = Question::where('test_title_id', $test_title->id)->get();

        return view('test-title.edit', compact('test_title', 'type', 'subjects', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Test_title $test_title
     * @return RedirectResponse
     */
    public function update(Request $request, Test_title $test_title)
    {
        foreach ($request['answer'][23] as $val => $ans){
            foreach ($request['is_check'][23] as $val1 => $check){
                if($val == $val1){
                   echo ($val . "->" .$ans . "<br>");
                   echo ($val1 . "->" .$check . "<br>");
                }
            }
        }
//        dd();

//        dd($request->all());

        $request->validate([
            'title_uz' => 'required',
            'question.*' => 'required',
            'answer.*' => 'required'
        ]);

        $test_title->update([
            'title_uz' => $request->title_uz,
            'type_id' => $request->type_id,
            'subject_id' => $request->subject_id
        ]);

        if(isset($request->question)) {
            for ($i = 0; $i < count($request->question); $i++) {

                $question = Question::updateOrCreate(['id' => $request->question_id[$i]], [
                    'question' => $request->question[$i],
                    'test_title_id' => $test_title->id
                ]);
                foreach ($request['answer'][$question->id] as $val => $ans){
                    foreach ($request['is_check'][$question->id] as $val1 => $check){
                        if($val == $val1){
                            Answer::updateOrCreate(['question_id' => $question->id], [
                                'answer' => $ans,
                                'question_id' => $question->id,
                                'is_true' => $check
                            ]);
                        }
                    }
                }
            }
        }
        return redirect()->route("teacher.test-title.index")->with("message", "testlar yangilandi!");
    }

    public function remove_question(Request $request){
        if ($request->ajax()) {
            $remove = Question::where('id', $request->id)->delete();
            return response()->json($remove);
        }
    }

    public function remove_answer(Request $request){
        if ($request->ajax()) {
            Answer::where('id', $request->answer_id)->delete();
            return response()->json("delete answer");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Test_title $test_title
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Test_title $test_title)
    {
        $test_title->delete();

        return redirect()->route("teacher.test-title.index")->with("message", "success deleted");
    }
}
