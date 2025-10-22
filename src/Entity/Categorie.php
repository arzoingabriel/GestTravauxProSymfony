<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Entrepreneur>
     */
    #[ORM\ManyToMany(targetEntity: Entrepreneur::class, mappedBy: 'Categorie')]
    private Collection $entrepreneurs;

    /**
     * @var Collection<int, Prestation>
     */
    #[ORM\OneToMany(targetEntity: Prestation::class, mappedBy: 'Categorie')]
    private Collection $prestations;

    public function __construct()
    {
        $this->entrepreneurs = new ArrayCollection();
        $this->prestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Entrepreneur>
     */
    public function getEntrepreneurs(): Collection
    {
        return $this->entrepreneurs;
    }

    public function addEntrepreneur(Entrepreneur $entrepreneur): static
    {
        if (!$this->entrepreneurs->contains($entrepreneur)) {
            $this->entrepreneurs->add($entrepreneur);
            $entrepreneur->addCategorie($this);
        }

        return $this;
    }

    public function removeEntrepreneur(Entrepreneur $entrepreneur): static
    {
        if ($this->entrepreneurs->removeElement($entrepreneur)) {
            $entrepreneur->removeCategorie($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Prestation>
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    public function addPrestation(Prestation $prestation): static
    {
        if (!$this->prestations->contains($prestation)) {
            $this->prestations->add($prestation);
            $prestation->setCategorie($this);
        }

        return $this;
    }

    public function removePrestation(Prestation $prestation): static
    {
        if ($this->prestations->removeElement($prestation)) {
            // set the owning side to null (unless already changed)
            if ($prestation->getCategorie() === $this) {
                $prestation->setCategorie(null);
            }
        }

        return $this;
    }
}
