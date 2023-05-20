<?php

namespace SeHo\SimpleDTO\Assembler;

use SeHo\SimpleDTO\DTO\DTOInterface;
use SeHo\SimpleDTO\Entity\Entity;

/**
 * Interface Assembler.
 *
 * An Entity DTO assembler is responsible for (reverse) transforming an Entity to a Data Transfer Object.
 */
interface EntityAssemblerInterface
{
    /**
     * Transform an Entity to a Data Transfer Object.
     */
    public function transformEntity(Entity $entity): DTOInterface;

    /**
     * Transform a Data Transfer Object to an (existing) Entity.
     */
    public function reverseTransformEntity(DTOInterface $dto, ?Entity $entity): Entity;
}
