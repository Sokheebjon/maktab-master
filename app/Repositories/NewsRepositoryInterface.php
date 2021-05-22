<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Http\Request;

interface NewsRepositoryInterface
{
    public function all();

    public function create();

    /**
     * @param News $news
     * @return News
     */
    public function showFindId(News $news): News;

    public function store(Request $request);

    /**
     * @param Request $request
     * @param News $news
     */
    public function updateId(Request $request, News $news);

    public function deleting(News $news);
}
