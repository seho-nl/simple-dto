<?php

namespace SeHo\SimpleDTO\Transformer;

use SeHo\SimpleDTO\DTO\DTOInterface;
use Symfony\Component\Validator\Validation;

abstract class Transformer implements TransformerInterface
{
    /**
     * Validate all constraints and add resulting violations to the DataTransferObject.
     */
    protected function validateDto(DTOInterface $dto): DTOInterface
    {
        $validator = Validation::createValidator();

        $constraintViolations = $validator->validate($dto);
        $dto->addConstraintViolations($constraintViolations);

        return $dto;
    }
}
