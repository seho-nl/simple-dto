<?php

namespace SeHo\SimpleDTO\Assembler;

use SeHo\SimpleDTO\DTO\DataTransferObjectInterface;
use Symfony\Component\Validator\Validation;

abstract class Assembler implements AssemblerInterface
{
    /**
     * Validate all constraints and add resulting violations to the DataTransferObject.
     */
    protected function validateDto(DataTransferObjectInterface $dto): DataTransferObjectInterface
    {
        $validator = Validation::createValidator();

        $constraintViolations = $validator->validate($dto);
        $dto->addConstraintViolations($constraintViolations);

        return $dto;
    }
}
