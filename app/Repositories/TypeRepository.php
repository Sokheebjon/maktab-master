<?php

namespace App\Repositories;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeRepository implements TypeRepositoryInterface
{
    public function all()
    {
        return $categories = Type::orderBy('id', 'desc')->get();
    }

    /**
     * @param Type $type
     * @return Type
     */

    public function showFindId(Type $type): Type
    {
        return $type;
    }

    public function store(Request $request){
        $request->validate([
            'type' => 'required',
        ]);
        Type::create($request->all());
    }

    /**
     * @param Request $request
     * @param Type $type
     */
    public function updateId(Request $request, Type $type)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $type->update($request->all());
    }

    public function deleting(Type $type){
        try {
            $type->delete();
        } catch (\Exception $e) {

        }
    }


}
