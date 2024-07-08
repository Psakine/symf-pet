<?php

declare(strict_types=1);

namespace App\Model;

class Moderation extends BaseModel
{
    private ?int $id = null;

    private ?\DateTimeImmutable $moderated_at = null;

    private ?Advertisement $advertisement_id = null;

    private ?User $moderator_id = null;

    private ?string $decision = null;

    private ?string $reason = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}