<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Region;
use Doctrine\Common\Collections\Collection;

class City extends BaseModel
{
    private ?int $id = null;

    private ?string $name = null;

    private ?Region $region_id = null;

    private Collection $advertisements;

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

    public function getRegionId(): ?Region
    {
        return $this->region_id;
    }

    public function setRegionId(?Region $region_id): void
    {
        $this->region_id = $region_id;
    }

    public function getAdvertisements(): Collection
    {
        return $this->advertisements;
    }

    public function setAdvertisements(Collection $advertisements): void
    {
        $this->advertisements = $advertisements;
    }
}