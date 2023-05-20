<?php

namespace SeHo\SimpleDTO\DTO;

use Symfony\Component\HttpFoundation\Request;

interface RequestDTOInterface extends DTOInterface
{
    public static function fromPostRequest(Request $request): self;
}
