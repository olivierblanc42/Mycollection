<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ExpansionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Put;

#[ORM\Entity(repositoryClass: ExpansionRepository::class)]
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
class Expansion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $label = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $creationDate = null;

    #[ORM\Column(length: 1000)]
    private ?string $descritpion = null;

    /**
     * @var Collection<int, CardTcg>
     */
    #[ORM\OneToMany(targetEntity: CardTcg::class, mappedBy: 'expension')]
    private Collection $cardsTcg;

    #[ORM\ManyToOne(inversedBy: 'expensions')]
    private ?Tcg $tcg = null;

    public function __construct()
    {
        $this->cardsTcg = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getCreationDate(): ?\DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTime $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getDescritpion(): ?string
    {
        return $this->descritpion;
    }

    public function setDescritpion(string $descritpion): static
    {
        $this->descritpion = $descritpion;

        return $this;
    }

    /**
     * @return Collection<int, CardTcg>
     */
    public function getCardsTcg(): Collection
    {
        return $this->cardsTcg;
    }

    public function addCardsTcg(CardTcg $cardsTcg): static
    {
        if (!$this->cardsTcg->contains($cardsTcg)) {
            $this->cardsTcg->add($cardsTcg);
            $cardsTcg->setExpansion($this);
        }

        return $this;
    }

    public function removeCardsTcg(CardTcg $cardsTcg): static
    {
        if ($this->cardsTcg->removeElement($cardsTcg)) {
            // set the owning side to null (unless already changed)
            if ($cardsTcg->getExpansion() === $this) {
                $cardsTcg->setExpansion(null);
            }
        }

        return $this;
    }

    public function getTcg(): ?Tcg
    {
        return $this->tcg;
    }

    public function setTcg(?Tcg $tcg): static
    {
        $this->tcg = $tcg;

        return $this;
    }
}
