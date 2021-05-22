<?php


namespace App\Repositories;


use App\Models\Events;
use App\Traits\Upload;
use Illuminate\Http\Request;

class EventsRepository
{
    use Upload;

    public function all()
    {
        return $events = Events::orderBy('id', 'desc')->paginate(10);
    }

    public function showFindId($events)
    {
        $events = Events::where('slug', '=', $events)->firstOrFail();

        return $events;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'about_uz' => 'required',
            'about_ru' => 'required',
            'begin_date' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:4096'
        ]);

        $all_request = $this->imageupload($request);

        Events::create($all_request);
    }

    public function updateId(Request $request, $events)
    {
        $events = Events::where('slug', '=', $events)->firstOrFail();

        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'about_uz' => 'required',
            'about_ru' => 'required',
            'begin_date' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:4096'
        ]);

        $images = $request->file("image");
        if ($images) {
            $imag = $this->updateimage($images, $events);
            try {
                $events->update(array_merge($request->all(), ['image' => $imag]));
            }  catch (\Exception $ex) {
                dd($ex);
            }
        } else {
            try {
                $events->update($request->all());
            }  catch (\Exception $ex) {
                dd($ex);
            }
        }
    }

    public function deleting($events)
    {
        $events = Events::where('slug', '=', $events)->firstOrFail();
        $events->delete();
    }
}
