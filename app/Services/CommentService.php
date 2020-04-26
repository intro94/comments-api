<?php


namespace App\Services;


use App\Comment;
use App\Contracts\Services\CommentServiceContract;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CommentService
 * @package App\Services
 */
class CommentService implements CommentServiceContract
{
    /**
     * @return Collection|null
     */
    public function getCommentList(): ?Collection
    {
        $commentList = Comment::all()->groupBy('parent_id');
        return $commentList->isNotEmpty() ? $commentList : null;
    }

    /**
     * @param string $replyCommentText
     * @param int $parentComment
     * @return Comment|null
     */
    public function createNewComment(string $replyCommentText, int $parentComment = 0): ?Comment
    {
        return Comment::create([
            'parent_id' => $parentComment,
            'comment_text' => $replyCommentText,
        ]);
    }
}
