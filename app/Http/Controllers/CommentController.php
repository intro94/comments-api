<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CommentServiceContract;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @return string
     */
    public function list(): string
    {
        $commentList = app(CommentServiceContract::class)->getCommentList();

        return response()->json([
            'error' => false,
            'message' =>'',
            'data' => [
                'commentList' => $commentList
            ]
        ]);
    }
}
