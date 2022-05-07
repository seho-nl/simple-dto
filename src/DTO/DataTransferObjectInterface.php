<?php

namespace SeHo\SimpleDTO\DTO;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Interface DataTransferObjectInterface.
 */
interface DataTransferObjectInterface
{
    public function isValid(): bool;

    /**
     * @return ConstraintViolationInterface[]
     */
    public function getConstraintViolations(): array;

    public function addConstraintViolations(ConstraintViolationListInterface $constraintViolations): void;
}
