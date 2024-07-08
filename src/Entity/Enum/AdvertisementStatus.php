<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum AdvertisementStatus
{
    case Draft;
    case Moderation;
    case Declined;
    case Sold;
    case Active;
}
