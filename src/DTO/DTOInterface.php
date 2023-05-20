<?php

namespace SeHo\SimpleDTO\DTO;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Interface DataTransferObjectInterface.
 */
interface DTOInterface
{
    public function isValid(): bool;

    /**
     * @return \ArrayIterator<int, ConstraintViolationInterface>
     */
    public function getConstraintViolations(): \ArrayIterator;

    public function addConstraintViolations(ConstraintViolationListInterface $constraintViolations): void;
}
