<?php

namespace App\Entity;

use App\Repository\ItemPictureRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: ItemPictureRepository::class)]
#[ApiResource]

class ItemPicture
{
    /** The ID of this ItemPicture. */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /** The path of this ItemPicture. */
    #[ORM\Column(length: 255)]
    private ?string $path = null;

    /** Whether this ItemPicture is the main one or not. */
    #[ORM\Column]
    private ?bool $isMain = null;

    /** The item this picture belongs to. */
    #[ORM\ManyToOne(inversedBy: 'itemPictures')]
    private ?Item $item = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function isMain(): ?bool
    {
        return $this->isMain;
    }

    public function setIsMain(bool $isMain): static
    {
        $this->isMain = $isMain;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }
}
