<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Support\Facades\DB;

class ListItemController extends Controller
{

    public function getItemsByList(int $listId)
    {
        $items = DB::table('list_items')
            ->join('contents', 'list_items.contentId', '=', 'contents.contentId')
            ->where('list_items.listId', $listId)
            ->select('contents.*') 
            ->get();

        return $items;
    }

    public function addItemToList(int $listId)
    {
        $contentId = request()->contentId;

        $item = ListItem::create([
            'listId' => $listId,
            'contentId' => $contentId
        ]);

        return $item->load('content');
    }

        public function deleteItemFromList(int $listId, int $contentId)
    {
        $item = ListItem::where('listId', $listId)
                        ->where('contentId', $contentId)
                        ->first();

        if (!$item) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Item eliminado correctamente']);
    }
}
