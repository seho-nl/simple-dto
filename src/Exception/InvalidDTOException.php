<?php

namespace SeHo\SimpleDTO\Exception;

use SeHo\SimpleDTO\DTO\DTOInterface;

class InvalidDTOException extends \InvalidArgumentException
{
    private const MESSAGE = 'Expecting a Data Transfer Object of class %s but %s is provided.';

    public function __construct(DTOInterface $dto, string $expectedClassString, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $expectedClassString, $dto::class), $code, $previous);
    }
}
