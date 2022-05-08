<?php

namespace SeHo\SimpleDTO\Exception;

class InvalidEntityException extends \InvalidArgumentException
{
    protected string $message = 'Expecting an Entity of class %s but %s is provided.';

    public function __construct($entity, string $expectedClassString, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(sprintf($this->message, $expectedClassString, $entity::class), $code, $previous);
    }
}
