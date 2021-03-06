<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CommentServiceContract;
use App\Http\Requests\CommentRequest;
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

    /**
     * @param CommentRequest $request
     * @param int $parentCommentId
     * @return JsonResponse
     */
    public function create(CommentRequest $request, int $parentCommentId = 0): JsonResponse
    {
        $createdComment = app(CommentServiceContract::class)->createNewComment($request->post('replyCommentText'), $parentCommentId);

        return response()->json([
            'error' => false,
            'message' =>'',
            'data' => [
                'createdComment' => $createdComment
            ]
        ], 201);
    }

    /**
     * @param CommentRequest $request
     * @param int $commentId
     * @return JsonResponse
     */
    public function update(CommentRequest $request, int $commentId): JsonResponse
    {
        $updatedComment = app(CommentServiceContract::class)->updateComment($request->post('replyCommentText'), $commentId);

        return response()->json([
            'error' => false,
            'message' =>'',
            'data' => [
                'updatedComment' => $updatedComment
            ]
        ], 201);
    }

    /**
     * @param int $commentId
     * @return JsonResponse
     */
    public function delete(int $commentId): JsonResponse
    {
        return app(CommentServiceContract::class)->deleteComment($commentId)
            ? response()->json([], 204)
            : response()->json([
                'error' => true,
                'message' => 'Comment has not been deleted',
                'data' => []
            ], 200);
    }
}
