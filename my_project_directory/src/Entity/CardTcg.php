<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CardTcgRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardTcgRepository::class)]
#[ApiResource]
class CardTcg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $rarity = null;

    #[ORM\Column(length: 10)]
    private ?string $cardCode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

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
}
