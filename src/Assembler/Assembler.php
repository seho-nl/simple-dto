<?php

namespace SeHo\SimpleDTO\Assembler;

use InvalidArgumentException;
use LogicException;
use SeHo\SimpleDTO\DTO\DataTransferObjectInterface;
use SeHo\SimpleDTO\Entity\Entity;
use Symfony\Component\Validator\Validation;

abstract class Assembler implements AssemblerInterface
{
    protected string $servesEntity = '';
    protected string $servesDto = '';

    /**
     * Checks whether the entity given to the assembler is actually the one this assembler should handle.
     * If not, then throw an InvalidArgumentException.
     */
    protected function failOnIncorrectEntity(Entity $entity): void
    {
        if (empty($this->servesEntity)) {
            throw new LogicException('This assembler serves no Entity yet. An assembler is only valid if it serves one specific Entity.');
        }

        if (!($entity instanceof $this->servesEntity)) {
            throw new InvalidArgumentException('Expected Entity here is '.$this->servesEntity.' but '.get_class($entity).' is provided as parameter.');
        }
    }

    /**
     * Checks whether the DTO given to the assembler is actually the one this assembler should handle.
     * If not, then throw an InvalidArgumentException.
     */
    protected function failOnIncorrectDto(DataTransferObjectInterface $dto): void
    {
        if (empty($this->servesDto)) {
            throw new LogicException('This assembler serves no DataTransferObject yet. An assembler is only valid if it serves one specific DataTransferObject.');
        }

        if (!($dto instanceof $this->servesDto)) {
            throw new InvalidArgumentException('Expected DataTransferObject here is '.$this->servesDto.' but '.get_class($dto).' is provided as parameter.');
        }
    }

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
