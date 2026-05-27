<?php

namespace App\Http\Controllers;

use App\Models\ListModel;

class UserListController extends Controller
{

    public function getListsByUser($userId)
    {
        $lists = ListModel::where('userId', $userId)->get();

        return $lists;
    }

    public function createList(int $userId)
    {
        $list = ListModel::create([
            'userId' => $userId,
            'listName' => request()->name,
            'listDescription' => request()->description,
        ]);

        return $list;
    }

    public function updateList(int $listId)
    {
        $list = ListModel::findOrFail($listId);
        $list->listName = request()->name;
        $list->listDescription = request()->description;
        $list->save();
        return $list;
    }

    public function deleteList(int $listId)
    {
        $list = ListModel::findOrFail($listId);
        $list->delete();
        return response()->json(['message' => 'Lista eliminada']);
    }
}
