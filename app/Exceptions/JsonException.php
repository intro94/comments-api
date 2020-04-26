<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class JsonException
 * @package App\Exceptions
 */
class JsonException extends Exception
{
    /**
     * @var int
     */
    private int $httpCode = 404;

    /**
     * InternalException constructor.
     * @param string $message
     * @param int $httpCode
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message, int $httpCode = 404, $code = 0, Throwable $previous = null)
    {
        $this->httpCode = $httpCode;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }
}
