<?php

namespace App\Entity;

use App\Repository\IllustratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Put;


#[ORM\Entity(repositoryClass: IllustratorRepository::class)]
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
class Illustrator
{
    /** The ID of this illustrator. */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /** The nickname of this illustrator. */
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nickname = null;

    /** The firstName of this illustrator. */
    #[ORM\Column(length: 50)]
    private ?string $firstName = null;

    /** The lastName of this illustrator. */
    #[ORM\Column(length: 50)]
    private ?string $lastName = null;

    /** The illustrator picture of this illustrator. */
    #[ORM\Column(length: 255)]
    private ?string $illustratorPicture = null;

    /** The birth date of this illustrator. */
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $birthDate = null;

    /**
     * @var Collection<int, Item>
     */
    #[ORM\ManyToMany(targetEntity: Item::class, mappedBy: 'illustrator')]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getIllustratorPicture(): ?string
    {
        return $this->illustratorPicture;
    }

    public function setIllustratorPicture(string $illustratorPicture): static
    {
        $this->illustratorPicture = $illustratorPicture;

        return $this;
    }

    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTime $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->addIllustrator($this);
        }

        return $this;
    }

    public function removeItem(Item $item): static
    {
        if ($this->items->removeElement($item)) {
            $item->removeIllustrator($this);
        }

        return $this;
    }
}
