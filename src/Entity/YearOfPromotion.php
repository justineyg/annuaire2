<?php

namespace App\Entity;

use App\Repository\YearOfPromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YearOfPromotionRepository::class)]
class YearOfPromotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $year = null;

    #[ORM\OneToMany(mappedBy: 'year', targetEntity: Profil::class)]
    private Collection $profils;

    #[ORM\OneToOne(mappedBy: 'year', cascade: ['persist', 'remove'])]
    private ?Promotion $promotion = null;

    #[ORM\OneToOne(inversedBy: 'yearOfPromotion', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Promotion $name = null;

    public function __construct()
    {
        $this->profils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): static
    {
        $this->year = $year;

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
            $profil->setYear($this);
        }

        return $this;
    }

    public function removeProfil(Profil $profil): static
    {
        if ($this->profils->removeElement($profil)) {
            // set the owning side to null (unless already changed)
            if ($profil->getYear() === $this) {
                $profil->setYear(null);
            }
        }

        return $this;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(Promotion $promotion): static
    {
        // set the owning side of the relation if necessary
        if ($promotion->getYear() !== $this) {
            $promotion->setYear($this);
        }

        $this->promotion = $promotion;

        return $this;
    }

    public function getName(): ?Promotion
    {
        return $this->name;
    }

    public function setName(Promotion $name): static
    {
        $this->name = $name;

        return $this;
    }
}
