<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;;

use App\Models\Type;
use App\Repositories\TypeRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $typeRepository;

    public function __construct(TypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }
    public function index()
    {
        $type = $this->typeRepository->all();

        return view('type.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->typeRepository->store($request);

        return redirect()->route('admin.type.index')
            ->with('success','Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @return Application|Factory|View|Response
     */
    public function show(Type $type)
    {
        $type = $this->typeRepository->showFindId($type);
        return view("type.show", compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return Application|Factory|View|Response
     */
    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Type $type
     * @return RedirectResponse
     */
    public function update(Request $request, Type $type)
    {
        $this->typeRepository->updateId( $request,  $type);

        return redirect()->route('admin.type.index')
            ->with('success', "$request->type updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return RedirectResponse
     */
    public function destroy(Type $type)
    {
        $this->typeRepository->deleting($type);

        return redirect()->route('admin.type.index')
            ->with('success',"$type->type sucessfully deleted");
    }
}
