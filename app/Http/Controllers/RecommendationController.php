<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Discarded;
use App\Models\ListItem;

class RecommendationController extends Controller
{
    /**
 * @OA\Post(
 *     path="/api/recommendations",
 *     summary="Obtiene una recomendación de libro según emociones",
 *     tags={"Recomendaciones"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="emotions",
 *                 type="array",
 *                 @OA\Items(type="string"),
 *                 example={"happy", "romantic"}
 *             ),
 *             @OA\Property(
 *                 property="userId",
 *                 type="integer",
 *                 nullable=true,
 *                 example=5
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Libro recomendado devuelto correctamente"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No hay recomendaciones disponibles"
 *     )
 * )
 */

    public function getRecommendation()
    {

        $emotions = request()->emotions ?? [];

        $userId = request()->userId;


        $emotionToGenres = [
            'calm' => ['Poetry','Philosophy','Art','Photography','Religion'],
            'happy' => ['Romance','Comics & Graphic Novels','Juvenile Fiction','Young Adult Fiction','Music'],
            'sad' => ['Drama','Poetry','Biography & Autobiography'],
            'intense' => ['Thriller','Mystery','Science Fiction','Horror'],
            'dark' => ['Horror','Mystery','Drama'],
            'romantic' => ['Romance','Young Adult Fiction','Fiction'],
            'adventurous' => ['Fantasy','Science Fiction','Travel','Historical'],
            'nostalgic' => ['Historical','Poetry','Biography & Autobiography','Fiction'],
            'inspiring' => ['Self-Help','Biography & Autobiography','Health & Fitness','Education'],
            'reflective' => ['Philosophy','Religion','Psychology','Poetry'],
        ];


        $selectedGenres = [];
        foreach ($emotions as $emotion) {
            if (isset($emotionToGenres[$emotion])) {
                $selectedGenres = array_merge($selectedGenres, $emotionToGenres[$emotion]);
            }
        }

        if (empty($selectedGenres)) {
            return response()->json(['message' => 'No genres found for selected emotions'], 400);
        }

        $query = Content::whereIn('genre', $selectedGenres);


        if ($userId) {
            $discardedIds = Discarded::where('userId', $userId)->pluck('contentId');
            $query->whereNotIn('contentId', $discardedIds);
        }


        if ($userId) {
            $addedIds = ListItem::whereHas('list', function ($q) use ($userId) {
                $q->where('userId', $userId);
            })->pluck('contentId');

            $query->whereNotIn('contentId', $addedIds);
        }


        $recommendation = $query->inRandomOrder()->first();

        if (!$recommendation) {
            return response()->json(['message' => 'No recommendations available'], 404);
        }

        return $recommendation;
    }
}
