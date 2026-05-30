<?php

namespace App\Http\Controllers;

use App\Models\Discarded;

class DiscardedController extends Controller
{

    public function addToDiscarded(int $userId, int $contentId)
    {

        $exists = Discarded::where('userId', $userId)
                           ->where('contentId', $contentId)
                           ->first();

        if ($exists) {
            return response()->json(['message' => 'El contenido ya está descartado'], 200);
        }


        $discarded = Discarded::create([
            'userId' => $userId,
            'contentId' => $contentId
        ]);

        return $discarded;
    }

        public function getDiscardedByUser(int $userId)
    {
        $discarded = Discarded::where('userId', $userId)
                              ->with('content')
                              ->get();

        return $discarded;
    }
}
