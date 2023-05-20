<?php

namespace SeHo\SimpleDTO\DTO;

use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class DataTransferObject.
 */
abstract class DTO implements DTOInterface
{
    protected ConstraintViolationList $constraintViolationList;

    public function isValid(): bool
    {
        return 0 === $this->constraintViolationList->count();
    }

    public function getConstraintViolations(): \ArrayIterator
    {
        $this->createConstraintViolationList();

        return $this->constraintViolationList->getIterator();
    }

    public function addConstraintViolations(ConstraintViolationListInterface $constraintViolations): void
    {
        $this->createConstraintViolationList();
        $this->constraintViolationList->addAll($constraintViolations);
    }

    private function createConstraintViolationList(): void
    {
        if (!isset($this->constraintViolationList)) {
            $this->constraintViolationList = new ConstraintViolationList();
        }
    }
}
