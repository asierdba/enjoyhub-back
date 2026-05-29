<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ListItem;
use Illuminate\Support\Facades\DB;

class ListItemController extends Controller
{

    public function getItemsByList(int $listId)
    {
        $contentIds = DB::table('list_items')
            ->where('listId', $listId)
            ->pluck('contentId');

        return Content::with(['authors', 'genres'])
            ->whereIn('contentId', $contentIds)
            ->get();
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
        $deleted = DB::table('list_items')
            ->where('listId', $listId)
            ->where('contentId', $contentId)
            ->delete();

        if (!$deleted) {
            return response()->json(['message' => 'Item no encontrado'], 404);
        }

        return response()->json(['message' => 'Item eliminado correctamente']);
    }
}
