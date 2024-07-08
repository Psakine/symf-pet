<?php

namespace App\Entity;

use App\Repository\ModerationRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModerationRepository::class)]
class Moderation extends BaseEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private ?DateTime $moderated_at = null;

    #[ORM\ManyToOne(inversedBy: 'moderations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Advertisement $advertisement = null;

    #[ORM\ManyToOne(inversedBy: 'moderations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $moderator = null;

    #[ORM\Column(length: 32)]
    private ?string $decision = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reason = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getModeratedAt(): ?DateTime
    {
        return $this->moderated_at;
    }

    public function setModeratedAt(DateTime $moderated_at): self
    {
        $this->moderated_at = $moderated_at;

        return $this;
    }

    public function getAdvertisement(): ?Advertisement
    {
        return $this->advertisement;
    }

    public function setAdvertisement(?Advertisement $advertisement): self
    {
        $this->advertisement = $advertisement;

        return $this;
    }

    public function getModerator(): ?User
    {
        return $this->moderator;
    }

    public function setModerator(?User $moderator): self
    {
        $this->moderator = $moderator;

        return $this;
    }

    public function getDecision(): ?string
    {
        return $this->decision;
    }

    public function setDecision(string $decision): self
    {
        $this->decision = $decision;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function onPrePersist(): void
    {
        parent::onPrePersist();
        $this->moderated_at = new DateTime('now');
    }

    public function onPreUpdate(): void
    {
        parent::onPreUpdate();
        $this->moderated_at = new DateTime('now');
    }
}
