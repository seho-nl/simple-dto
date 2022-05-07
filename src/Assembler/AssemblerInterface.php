<?php

namespace SeHo\SimpleDTO\Assembler;

use SeHo\SimpleDTO\DTO\DataTransferObjectInterface;
use SeHo\SimpleDTO\Entity\Entity;

/**
 * Interface Assembler.
 *
 * A DTO assembler is responsible for (reverse) transforming an Entity to a Data Transfer Object.
 */
interface AssemblerInterface
{
    /**
     * Transform an Entity to a Data Transfer Object.
     */
    public function transform(Entity $entity): DataTransferObjectInterface;

    /**
     * Transform a Data Transfer Object to an (existing) Entity.
     */
    public function reverseTransform(DataTransferObjectInterface $dto, ?Entity $entity): Entity;
}
