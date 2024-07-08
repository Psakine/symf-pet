<?php

declare(strict_types=1);

namespace App\Helpers;

class EnumHelper
{
    public static function isValueExists(array $cases, mixed $value): bool
    {
        foreach ($cases as $case) {
            if ($case->name === $value || (property_exists($case, 'value') && $case->value === $value)) {
                return true;
            }
        }

        return false;
    }
}
