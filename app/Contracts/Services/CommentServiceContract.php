<?php

namespace App\Contracts\Services;

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
}
