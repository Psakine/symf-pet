<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum UserStatus
{
    case Active;
    case Blocked;
    case IdleEmailActivation;
}