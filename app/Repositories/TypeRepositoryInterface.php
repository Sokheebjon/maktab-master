<?php

namespace App\Repositories;

use App\Models\Type;
use Illuminate\Http\Request;

interface TypeRepositoryInterface
{
    public function all();

    /**
     * @param Type $type
     * @return Type
     */
    public function showFindId(Type $type): Type;

    public function store(Request $request);

    /**
     * @param Request $request
     * @param Type $type
     */
    public function updateId(Request $request, Type $type);

    public function deleting(Type $type);
}
