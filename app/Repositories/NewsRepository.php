<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\News;
use App\Traits\Upload;
use Illuminate\Http\Request;

class NewsRepository implements NewsRepositoryInterface
{
    use Upload;

    public function all()
    {
        return $news = News::with('category')->orderBy('id', 'desc')->paginate(100);
    }

    public function create()
    {
        return Category::get();
    }

    /**
     * @param News $news
     * @return News
     */

    public function showFindId(News $news): News
    {
        return $news;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'about_uz' => 'required',
            'about_ru' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:4096'
        ]);
        $all_request = $this->imageupload($request);

        News::create($all_request);
    }

    /**
     * @param Request $request
     * @param News $news
     */
    public function updateId(Request $request, News $news)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'about_uz' => 'required',
            'about_ru' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:4096'
        ]);
        $images = $request->file("image");
        if ($images) {
            $imag = $this->updateimage($images, $news);
            $news->update(array_merge($request->all(), ['image' => $imag]));
        } else {
            $news->update($request->all());
        }
    }

    public function deleting(News $news)
    {
        try {
            $news->delete();
        } catch (\Exception $e) {

        }
    }

}
