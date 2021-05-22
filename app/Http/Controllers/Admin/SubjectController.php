<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Repositories\SubjectRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */

    private $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subject = $this->subjectRepository->all();

        return view('subject.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
     return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->subjectRepository->store($request);
        return redirect()->route("admin.subject.index")->with("message", "Yangi xabar qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return Application|Factory|View|Response
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function update(Request $request, Subject $subject)
    {
        $this->subjectRepository->update($request,$subject);
        return redirect()->route("admin.subject.index")->with("message", "xabar Yangilandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function destroy(Subject $subject)
    {
        $this->subjectRepository->destroy($subject);
        return redirect()->route('admin.subject.index')
            ->with('success', "$subject->name sucessfully deleted");
    }
}
