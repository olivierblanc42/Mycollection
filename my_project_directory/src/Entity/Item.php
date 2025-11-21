<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $releaseDate = null;

    #[ORM\Column]
    private ?\DateTime $creationDate = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'items')]
    private Collection $users;

    /**
     * @var Collection<int, ItemLicense>
     */
    #[ORM\ManyToMany(targetEntity: ItemLicense::class, inversedBy: 'items')]
    private Collection $itemLicenses;

    /**
     * @var Collection<int, Illustrator>
     */
    #[ORM\ManyToMany(targetEntity: Illustrator::class, inversedBy: 'items')]
    private Collection $illustrator;

    #[ORM\ManyToOne(inversedBy: 'items')]
    private ?Category $category = null;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\ManyToMany(targetEntity: Character::class, inversedBy: 'items')]
    private Collection $characters;

    /**
     * @var Collection<int, ItemPicture>
     */
    #[ORM\OneToMany(targetEntity: ItemPicture::class, mappedBy: 'item')]
    private Collection $itemPictures;

    #[ORM\ManyToOne(inversedBy: 'items')]
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    private ?Expansion $expansion = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->itemLicenses = new ArrayCollection();
        $this->illustrator = new ArrayCollection();
        $this->characters = new ArrayCollection();
        $this->itemPictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTime $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addItem($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeItem($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ItemLicense>
     */
    public function getItemLicenses(): Collection
    {
        return $this->itemLicenses;
    }

    public function addItemLicense(ItemLicense $itemLicense): static
    {
        if (!$this->itemLicenses->contains($itemLicense)) {
            $this->itemLicenses->add($itemLicense);
        }

        return $this;
    }

    public function removeItemLicense(ItemLicense $itemLicense): static
    {
        $this->itemLicenses->removeElement($itemLicense);

        return $this;
    }

    /**
     * @return Collection<int, Illustrator>
     */
    public function getIllustrator(): Collection
    {
        return $this->illustrator;
    }

    public function addIllustrator(Illustrator $illustrator): static
    {
        if (!$this->illustrator->contains($illustrator)) {
            $this->illustrator->add($illustrator);
        }

        return $this;
    }

    public function removeIllustrator(Illustrator $illustrator): static
    {
        $this->illustrator->removeElement($illustrator);

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): static
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        $this->characters->removeElement($character);

        return $this;
    }

    /**
     * @return Collection<int, ItemPicture>
     */
    public function getItemPictures(): Collection
    {
        return $this->itemPictures;
    }

    public function addItemPicture(ItemPicture $itemPicture): static
    {
        if (!$this->itemPictures->contains($itemPicture)) {
            $this->itemPictures->add($itemPicture);
            $itemPicture->setItem($this);
        }

        return $this;
    }

    public function removeItemPicture(ItemPicture $itemPicture): static
    {
        if ($this->itemPictures->removeElement($itemPicture)) {
            // set the owning side to null (unless already changed)
            if ($itemPicture->getItem() === $this) {
                $itemPicture->setItem(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getExpansion(): ?Expansion
    {
        return $this->expansion;
    }

    public function setExpansion(?Expansion $expansion): static
    {
        $this->expansion = $expansion;

        return $this;
    }
}
