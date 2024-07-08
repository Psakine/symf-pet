<?php

declare(strict_types=1);

namespace App\Model;

use Doctrine\Common\Collections\Collection;

class Region extends BaseModel
{
    private ?int $id = null;

    private ?string $name = null;

    private Collection $cities;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function setCities(Collection $cities): void
    {
        $this->cities = $cities;
    }
}