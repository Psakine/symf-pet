<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;
use Doctrine\Common\Collections\Collection;

class Advertisement extends BaseModel
{
    private ?int $id = null;

    private ?string $name = null;

    private Collection $category_id;

    private Collection $city;

    private ?DateTime $published_at = null;

    private ?float $price = null;

    private ?User $seller_id = null;

    private ?int $views = null;

    private ?string $photos = null;

    private ?string $status = null;

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

    public function getCategoryId(): Collection
    {
        return $this->category_id;
    }

    public function setCategoryId(Collection $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function getCity(): Collection
    {
        return $this->city;
    }

    public function setCity(Collection $city): void
    {
        $this->city = $city;
    }

    public function getPublishedAt(): ?DateTime
    {
        return $this->published_at;
    }

    public function setPublishedAt(?DateTime $published_at): void
    {
        $this->published_at = $published_at;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getSellerId(): ?User
    {
        return $this->seller_id;
    }

    public function setSellerId(?User $seller_id): void
    {
        $this->seller_id = $seller_id;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): void
    {
        $this->views = $views;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(?string $photos): void
    {
        $this->photos = $photos;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }
}