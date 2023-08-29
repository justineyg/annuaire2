<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'promotion', targetEntity: Profil::class)]
    private Collection $profils;

    #[ORM\OneToOne(inversedBy: 'promotion', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?YearOfPromotion $year = null;

    #[ORM\OneToOne(mappedBy: 'name', cascade: ['persist', 'remove'])]
    private ?YearOfPromotion $yearOfPromotion = null;

    public function __construct()
    {
        $this->profils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Profil>
     */
    public function getProfils(): Collection
    {
        return $this->profils;
    }

    public function addProfil(Profil $profil): static
    {
        if (!$this->profils->contains($profil)) {
            $this->profils->add($profil);
            $profil->setPromotion($this);
        }

        return $this;
    }

    public function removeProfil(Profil $profil): static
    {
        if ($this->profils->removeElement($profil)) {
            // set the owning side to null (unless already changed)
            if ($profil->getPromotion() === $this) {
                $profil->setPromotion(null);
            }
        }

        return $this;
    }

    public function getYear(): ?YearOfPromotion
    {
        return $this->year;
    }

    public function setYear(YearOfPromotion $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getYearOfPromotion(): ?YearOfPromotion
    {
        return $this->yearOfPromotion;
    }

    public function setYearOfPromotion(YearOfPromotion $yearOfPromotion): static
    {
        // set the owning side of the relation if necessary
        if ($yearOfPromotion->getName() !== $this) {
            $yearOfPromotion->setName($this);
        }

        $this->yearOfPromotion = $yearOfPromotion;

        return $this;
    }
}
