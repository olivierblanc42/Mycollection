<?php

namespace App\Entity;

use App\Repository\GenderUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ORM\Entity(repositoryClass: GenderUserRepository::class)]
#[ApiResource]

class GenderUser
{

    /** The ID of this gender user. */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /** The label of this gender user. */
    #[ORM\Column(length: 50)]
    private ?string $label = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'genderUser')]
    private Collection $app_users;

    public function __construct()
    {
        $this->app_users = new ArrayCollection();
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

    /**
     * @return Collection<int, User>
     */
    public function getAppUsers(): Collection
    {
        return $this->app_users;
    }

    public function addAppUser(User $appUser): static
    {
        if (!$this->app_users->contains($appUser)) {
            $this->app_users->add($appUser);
            $appUser->setGenderUser($this);
        }

        return $this;
    }

    public function removeAppUser(User $appUser): static
    {
        if ($this->app_users->removeElement($appUser)) {
            // set the owning side to null (unless already changed)
            if ($appUser->getGenderUser() === $this) {
                $appUser->setGenderUser(null);
            }
        }

        return $this;
    }
}
