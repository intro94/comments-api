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
     * @return Collection
     */
    public function getCommentList(): Collection
    {
        return Comment::all()->groupBy('parent_id');
    }
}
