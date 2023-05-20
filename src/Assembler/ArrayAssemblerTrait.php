<?php

namespace SeHo\SimpleDTO\Assembler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

trait ArrayAssemblerTrait
{
    private function validateArrayDto(array $data, string $dtoClass): bool
    {
        $reflectionExtractor = new ReflectionExtractor([], [], [], true, ReflectionExtractor::ALLOW_PRIVATE);

        foreach ($reflectionExtractor->getProperties($dtoClass) ?? [] as $property) {
            if (!key_exists($property, $data)) {
                return false;
            }
        }

        return true;
    }
}
