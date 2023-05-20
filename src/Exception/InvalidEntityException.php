<?php

namespace SeHo\SimpleDTO\Exception;

use SeHo\SimpleDTO\Entity\Entity;

class InvalidEntityException extends \InvalidArgumentException
{
    private const MESSAGE = 'Expecting an Entity of class %s but %s is provided.';

    public function __construct(Entity $entity, string $expectedClassString, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $expectedClassString, $entity::class), $code, $previous);
    }
}
