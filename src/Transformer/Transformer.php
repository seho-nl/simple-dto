<?php

namespace SeHo\SimpleDTO\Transformer;

use SeHo\SimpleDTO\DTO\DataTransferObjectInterface;
use Symfony\Component\Validator\Validation;

abstract class Transformer implements TransformerInterface
{
    protected string $servesDto;

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
