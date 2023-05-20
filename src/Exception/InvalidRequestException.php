<?php

namespace SeHo\SimpleDTO\Exception;

class InvalidRequestException extends \InvalidArgumentException
{
    private const MESSAGE = 'Request object is invalid. Are you sure the object was a POST Request?';

    public function __construct(int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}
