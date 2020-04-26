<?php


namespace App\Services;


use App\Comment;
use App\Contracts\Services\CommentServiceContract;
use App\Exceptions\JsonException;
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
        $commentList = Comment::withTrashed()->get()->groupBy('parent_id');
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

    /**
     * @param string $updateCommentText
     * @param int $commentId
     * @return Comment
     * @throws JsonException
     */
    public function updateComment(string $updateCommentText, int $commentId): Comment
    {
        try {
            $comment = Comment::findOrFail($commentId);
            $comment->comment_text = $updateCommentText;
            $comment->save();
        } catch (\Exception $e) {
            throw new JsonException('The specified comment does not exist', 404, $e->getCode(), $e);
        }

        return $comment;
    }

    /**
     * @param int $commentId
     * @return bool
     * @throws JsonException
     */
    public function deleteComment(int $commentId): bool
    {
        try {
            $comment = Comment::findOrFail($commentId);
            if ($comment) {
                $comment->delete();
            }
        } catch (\Exception $e) {
            throw new JsonException('The specified comment does not exist', 404, $e->getCode(), $e);
        }

        return true;
    }
}
