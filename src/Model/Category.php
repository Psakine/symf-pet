<?php

declare(strict_types=1);

namespace App\Model;

use Doctrine\Common\Collections\Collection;

class Category extends BaseModel
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $code = null;

    private ?string $description = null;

    private ?self $parent_id = null;

    private Collection $sort;

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getParentId(): ?Category
    {
        return $this->parent_id;
    }

    public function setParentId(?Category $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    public function getSort(): Collection
    {
        return $this->sort;
    }

    public function setSort(Collection $sort): void
    {
        $this->sort = $sort;
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