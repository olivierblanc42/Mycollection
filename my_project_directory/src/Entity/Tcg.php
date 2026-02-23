<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TcgRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Put;

#[ORM\Entity(repositoryClass: TcgRepository::class)]
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
class Tcg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $label = null;

    #[ORM\Column(length: 1000)]
    private ?string $description = null;

    /**
     * @var Collection<int, Expension>
     */
    #[ORM\OneToMany(targetEntity: Expansion::class, mappedBy: 'tcg')]
    private Collection $expensions;

    public function __construct()
    {
        $this->expensions = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Expension>
     */
    public function getExpensions(): Collection
    {
        return $this->expensions;
    }

    public function addExpension(Expansion $expension): static
    {
        if (!$this->expensions->contains($expension)) {
            $this->expensions->add($expension);
            $expension->setTcg($this);
        }

        return $this;
    }

    public function removeExpension(Expansion $expension): static
    {
        if ($this->expensions->removeElement($expension)) {
            // set the owning side to null (unless already changed)
            if ($expension->getTcg() === $this) {
                $expension->setTcg(null);
            }
        }

        return $this;
    }
}
