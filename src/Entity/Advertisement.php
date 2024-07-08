<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Enum\AdvertisementStatus;
use App\Exception\Entity\Enum\EnumNotFoundException;
use App\Repository\AdvertisementRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdvertisementRepository::class)]
class Advertisement extends BaseEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'advertisements')]
    private Collection $category;

    #[ORM\ManyToMany(targetEntity: City::class, inversedBy: 'advertisements')]
    private Collection $city;

    #[ORM\Column]
    private ?DateTime $published_at = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'advertisements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $seller = null;

    #[ORM\Column]
    private ?int $views = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photos = null;

    #[ORM\Column(length: 32)]
    private ?string $status = null;

    #[ORM\OneToMany(mappedBy: 'advertisement_id', targetEntity: Moderation::class, orphanRemoval: true)]
    private Collection $moderations;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->city = new ArrayCollection();
        $this->moderations = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategoryId(): Collection
    {
        return $this->category;
    }

    public function addCategoryId(Category $categoryId): self
    {
        if (!$this->category->contains($categoryId)) {
            $this->category->add($categoryId);
        }

        return $this;
    }

    public function removeCategoryId(Category $categoryId): self
    {
        $this->category->removeElement($categoryId);

        return $this;
    }

    /**
     * @return Collection<int, City>
     */
    public function getCity(): Collection
    {
        return $this->city;
    }

    public function addCity(City $city): self
    {
        if (!$this->city->contains($city)) {
            $this->city->add($city);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        $this->city->removeElement($city);

        return $this;
    }

    public function getPublishedAt(): ?DateTime
    {
        return $this->published_at;
    }

    public function setPublishedAt(DateTime $published_at): self
    {
        $this->published_at = $published_at;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSeller(): ?User
    {
        return $this->seller;
    }

    public function setSeller(?User $seller): self
    {
        $this->seller = $seller;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(?string $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @throws EnumNotFoundException
     */
    public function setStatus(string $status): self
    {
        if (!$this->isEnumValueExists(AdvertisementStatus::cases(), $status)) {
            throw new EnumNotFoundException(AdvertisementStatus::cases(), $status);
        }

        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Moderation>
     */
    public function getModerations(): Collection
    {
        return $this->moderations;
    }

    public function addModeration(Moderation $moderation): self
    {
        if (!$this->moderations->contains($moderation)) {
            $this->moderations->add($moderation);
            $moderation->setAdvertisementId($this);
        }

        return $this;
    }

    public function removeModeration(Moderation $moderation): self
    {
        // set the owning side to null (unless already changed)
        if ($this->moderations->removeElement($moderation) && $moderation->getAdvertisementId() === $this) {
            $moderation->setAdvertisementId(null);
        }

        return $this;
    }

    public function onPrePersist(): void
    {
        parent::onPrePersist();

        if ($this->getStatus() === AdvertisementStatus::Active) {
            $this->published_at = new DateTime('now');
        }
    }

    public function onPreUpdate(): void
    {
        parent::onPreUpdate();

        if ($this->getStatus() === AdvertisementStatus::Active) {
            $this->published_at = new DateTime('now');
        }
    }
}
