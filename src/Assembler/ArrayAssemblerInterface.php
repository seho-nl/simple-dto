<?php

namespace SeHo\SimpleDTO\Assembler;

use SeHo\SimpleDTO\DTO\DTOInterface;

/**
 * Interface Assembler.
 *
 * An Array DTO assembler is responsible for (reverse) transforming a Symfony POST Request to a Data Transfer Object.
 */
interface ArrayAssemblerInterface
{
    /**
     * Transform an array to a Data Transfer Object.
     */
    public function transformArray(array $data): DTOInterface;

    /**
     * Transform a Data Transfer Object to an array.
     */
    public function reverseTransformArray(DTOInterface $dto): array;

    /**
     * Validates the Symfony Request.
     * Default implementation can be found in {@link RequestAssemblerTrait::validateRequest()}
     */
    public function validateArray(array $data): bool;
}
