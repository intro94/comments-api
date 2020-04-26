<?php

namespace App\Contracts\Services;

use App\Comment;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CommentServiceContract
 * @package App\Contracts\Services
 */
interface CommentServiceContract
{
    /**
     * @return Collection|null
     */
    public function getCommentList(): ?Collection;

    /**
     * @param string $replyCommentText
     * @param int $parentCommentId
     * @return Comment
     */
    public function createNewComment(string $replyCommentText, int $parentCommentId = 0): Comment;

    /**
     * @param string $updateCommentText
     * @param int $commentId
     * @return Comment
     */
    public function updateComment(string $updateCommentText, int $commentId): Comment;

    /**
     * @param int $commentId
     * @return bool
     */
    public function deleteComment(int $commentId): bool;
}
