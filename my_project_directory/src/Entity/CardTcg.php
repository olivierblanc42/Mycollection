<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CardTcgRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Put;

#[ORM\Entity(repositoryClass: CardTcgRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            security: "is_granted('ROLE_USER')"
        ),
        new GetCollection(
            security: "is_granted('ROLE_USER')"
        ),
        new Post(
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Put(
            security: "is_granted('ROLE_ADMIN')"
        )
    ]
)]
class CardTcg extends Item
{


    #[ORM\Column(length: 20)]
    private ?string $rarity = null;

    #[ORM\Column(length: 10)]
    private ?string $cardCode = null;

    #[ORM\ManyToOne(inversedBy: 'cardsTcg')]
    private ?Expansion $expension = null;

    public function getRarity(): ?string
    {
        return $this->rarity;
    }

    public function setRarity(string $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getCardCode(): ?string
    {
        return $this->cardCode;
    }

    public function setCardCode(string $cardCode): static
    {
        $this->cardCode = $cardCode;

        return $this;
    }

    public function getExpansion(): ?Expansion
    {
        return $this->expension;
    }

    public function setExpansion(?Expansion $expension): static
    {
        $this->expension = $expension;

        return $this;
    }
}
