<?php

namespace SeHo\SimpleDTO\Assembler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

trait RequestAssemblerTrait
{
    protected function validateRequestDto(Request $request, string $dtoClass): bool
    {
        $reflectionExtractor = new ReflectionExtractor([], [], []);

        foreach ($reflectionExtractor->getProperties($dtoClass) ?? [] as $property) {
            if (!$request->request->has($property)) {
                return false;
            }
        }

        return true;
    }

    protected function decodeRequestParameter(array|string $param): array
    {
        if (is_string($param)) {
            return json_decode($param, true);
        }

        return array_map(static fn (string $jsonItem) => json_decode($jsonItem, true), $param);
    }
}
