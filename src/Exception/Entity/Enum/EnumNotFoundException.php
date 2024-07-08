<?php

declare(strict_types=1);

namespace App\Exception\Entity\Enum;

class EnumNotFoundException extends \Exception
{
    public function __construct(array $cases, $value)
    {
        $message = 'Enum value ' . $value . ' not match with list' . implode(', ', $cases);
        parent::__construct($message, 400, null);
    }
}