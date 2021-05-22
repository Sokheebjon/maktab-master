<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\News;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    private $newsRepository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $news = $this->newsRepository->all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $category = $this->newsRepository->create();

        return view('news.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->newsRepository->store($request);
        return redirect()->route("admin.news.index")->with("message", "Yangi xabar qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View|Response
     */
    public function show(News $news)
    {
        $news = $this->newsRepository->showFindId($news);

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View|Response
     */
    public function edit(News $news)
    {
        $category = Category::get();
        return view('news.edit', compact('news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $this->newsRepository->updateId($request, $news);

        return redirect()->route('admin.news.index')
            ->with('success', "$request->title_uz updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news)
    {
        $this->newsRepository->deleting($news);
        return redirect()->route('admin.news.index')
            ->with('success', "$news->title_uz sucessfully deleted");
    }
}
