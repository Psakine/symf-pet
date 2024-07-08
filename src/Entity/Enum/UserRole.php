<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum UserRole
{
    case User;
    case Admin;
}