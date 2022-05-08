<?php

namespace SeHo\SimpleDTO\Exception;

class InvalidDTOException extends \InvalidArgumentException
{
    protected string $message = 'Expecting a Data Transfer Object of class %s but %s is provided.';

    public function __construct($entity, string $expectedClassString, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(sprintf($this->message, $expectedClassString, $entity::class), $code, $previous);
    }
}
