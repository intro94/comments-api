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
     * @param int $parentComment
     * @return Comment|null
     */
    public function createNewComment(string $replyCommentText, int $parentComment = 0): ?Comment;
}
