<?php

namespace SeHo\SimpleDTO\DTO;

use Exception;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class DataTransferObject.
 */
abstract class DataTransferObject implements DataTransferObjectInterface
{
    protected ConstraintViolationList $constraintViolationList;

    public function isValid(): bool
    {
        return 0 === $this->constraintViolationList->count();
    }

    /**
     * @return ConstraintViolationInterface[]
     */
    public function getConstraintViolations(): array
    {
        try {
            $this->createConstraintViolationList();

            return $this->constraintViolationList->getIterator();
        } catch (Exception $e) {
            return [];
        }
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
