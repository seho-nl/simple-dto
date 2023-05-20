<?php

namespace SeHo\SimpleDTO\Assembler;

use SeHo\SimpleDTO\DTO\DTOInterface;
use Symfony\Component\Validator\Validation;

abstract class Assembler
{
    /**
     * Validate all constraints and add resulting violations to the DataTransferObject.
     */
    protected function validateDto(DTOInterface $dto): DTOInterface
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->addDefaultDoctrineAnnotationReader()
            ->getValidator();

        $constraintViolations = $validator->validate($dto);
        $dto->addConstraintViolations($constraintViolations);

        return $dto;
    }
}
