<?php

namespace App\Http\Controllers;

use App\Models\UserList;

class UserListController extends Controller
{

    public function getListsByUser($userId)
    {

        $lists = UserList::where('userId', $userId)->get();

        return $lists;
    }

    public function createList(int $userId)
    {

        $name = request()->name;
        $description = request()->description;


        $list = UserList::create([
            'userId' => $userId,
            'name' => $name,
            'description' => $description
        ]);

        return $list;
    }
}
