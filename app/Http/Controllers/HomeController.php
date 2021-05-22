<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Group;
use App\Models\News;
use App\Models\Raiting;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $events = Events::orderBy('created_at', 'DESC')->limit(6)->get();
        $news = News::orderBy('created_at', 'DESC')->limit(3)->get();
        $news = iterator_to_array($news);
        $students = User::where('role', 3)->count();
        $teachers = User::where('role', 2)->count();

        return view('frontend.home', compact(
            'events',
            'news',
            'students',
            'teachers'
        ));
    }
    public function show_event(Events $event)
    {
        return view('frontend.show_event', compact('event'));
    }

    public function show_news(News $news)
    {
        return view('frontend.show_news', compact('news'));
    }

    public function all_news($cat = null){

        if(!is_null($cat))
            $news = News::where('category_id', $cat)->paginate(1);
        else
            $news = News::paginate(2);
        return view('frontend.all_news', compact('news', 'cat'));
    }

    public function best_students(Request $request){

        if ($request->ajax()){
            $raiting = Raiting::with('users')->with('group')
                ->selectRaw('ROUND(AVG(mark),2) mark, user_id, group_id')
                ->where('group_id', $request->selected)
                ->groupBy('user_id')
                ->orderBy('mark', 'DESC')
                ->get();
            return response()->json($raiting);
        }
        else {
            $raiting = Raiting::selectRaw('AVG(mark) mark, user_id, group_id')
                ->where('group_id', 1)
                ->groupBy('user_id')
                ->orderBy('mark', 'DESC')
                ->paginate(20);
        }

        $all_group = Group::get();
            return view('frontend.best_students', compact('raiting', 'all_group'));
    }

}
