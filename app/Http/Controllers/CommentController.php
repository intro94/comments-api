<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CommentServiceContract;
use Illuminate\Http\JsonResponse;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $commentList = app(CommentServiceContract::class)->getCommentList();

        return response()->json([
            'error' => false,
            'message' =>'',
            'data' => [
                'commentList' => $commentList
            ]
        ], 200);
    }
}
