<?php

declare(strict_types=1);

namespace App\Entity;

use App\Helpers\EnumHelper;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
abstract class BaseEntity
{
    #[ORM\Column]
    protected ?DateTime $createdAt = null;
    #[ORM\Column]
    protected ?DateTime $updatedAt = null;

    #[ORM\PreFlush]
    public function preFlush(): void
    {
        $this->createdAt = new DateTime("now");
        $this->updatedAt = new DateTime("now");
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new DateTime("now");
    }

    protected function isEnumValueExists(array $cases, mixed $value): bool
    {
        return EnumHelper::isValueExists($cases, $value);
    }
}