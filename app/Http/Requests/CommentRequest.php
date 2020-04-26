<?php

namespace App\Http\Requests;

/**
 * Class CommentRequest
 * @package App\Http\Requests
 */
class CommentRequest extends AbstractRequest
{
    /**
     * @var array
     */
    protected const FIELDS = [
        'replyCommentText'
    ];
}
