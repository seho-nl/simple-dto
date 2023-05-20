<?php

namespace SeHo\SimpleDTO\Assembler;

use SeHo\SimpleDTO\DTO\DTOInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface Assembler.
 *
 * A Request DTO assembler is responsible for transforming a Symfony POST Request to a Data Transfer Object.
 */
interface RequestAssemblerInterface
{
    /**
     * Transform an POST request to a Data Transfer Object.
     */
    public function transformRequest(Request $request): DTOInterface;

    /**
     * Validates the Symfony Request.
     * Default implementation can be found in {@link RequestAssemblerTrait::validateRequest()}
     */
    public function validateRequest(Request $request): bool;
}
