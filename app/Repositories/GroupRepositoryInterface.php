<?php

namespace App\Repositories;

use App\Models\Group;
use Illuminate\Http\Request;

interface GroupRepositoryInterface
{
    public function all();

    public function create();

    /**
     * @param Request $request
     * @return Group
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param Group $group
     */
    public function updateId(Request $request, Group $group);

    public function deleting(Group $group);

    public function group_user(Group $group);

    public function group_user_store(Request $request, Group $group);
}
