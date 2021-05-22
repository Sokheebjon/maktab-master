<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Repositories\EventsRepository;
use App\Repositories\NewsRepositoryInterface;
use App\Traits\Upload;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function React\Promise\all;

class EventsController extends Controller
{
    use Upload;

    private $eventsRepository;

    public function __construct(EventsRepository $eventsRepository)
    {
        $this->eventsRepository = $eventsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $events = $this->eventsRepository->all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->eventsRepository->store($request);

        return redirect()->route("admin.events.index")->with("message", "Yangi event qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param Events $events
     * @return Events|Application|Factory|View
     */
    public function show($events)
    {
        $events = $this->eventsRepository->showFindId($events);

        return view('events.show', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Events $events
     * @return Application|Factory|View|Response
     */
    public function edit($events)
    {
        $events = Events::where('slug', '=', $events)->firstOrFail();

        return view('events.edit', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Events $events
     * @return RedirectResponse
     */
    public function update(Request $request, $events)
    {
        $this->eventsRepository->updateId($request, $events);

        return redirect()->route('admin.events.index')
            ->with('success', "$request->title_uz updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Events $events
     * @return RedirectResponse
     */
    public function destroy($events)
    {
        $this->eventsRepository->deleting($events);
        return redirect()->route('admin.events.index')
            ->with('success', "$events->title_uz sucessfully deleted");
    }
}
