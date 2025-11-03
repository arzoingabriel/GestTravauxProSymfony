<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BienRepository::class)]
class Bien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'biens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Proprietaire $Proprietaire = null;

    /**
     * @var Collection<int, Chantier>
     */
    #[ORM\OneToMany(targetEntity: Chantier::class, mappedBy: 'Bien')]
    private Collection $chantiers;

    #[ORM\Column(length: 255)]
    private ?string $adresseBien = null;

    #[ORM\Column(length: 255)]
    private ?string $villeBien = null;

    #[ORM\Column(length: 255)]
    private ?string $cpBien = null;

    public function __construct()
    {
        $this->chantiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->Proprietaire;
    }

    public function setProprietaire(?Proprietaire $Proprietaire): static
    {
        $this->Proprietaire = $Proprietaire;

        return $this;
    }

    /**
     * @return Collection<int, Chantier>
     */
    public function getChantiers(): Collection
    {
        return $this->chantiers;
    }

    public function addChantier(Chantier $chantier): static
    {
        if (!$this->chantiers->contains($chantier)) {
            $this->chantiers->add($chantier);
            $chantier->setBien($this);
        }

        return $this;
    }

    public function removeChantier(Chantier $chantier): static
    {
        if ($this->chantiers->removeElement($chantier)) {
            // set the owning side to null (unless already changed)
            if ($chantier->getBien() === $this) {
                $chantier->setBien(null);
            }
        }

        return $this;
    }

    public function getAdresseBien(): ?string
    {
        return $this->adresseBien;
    }

    public function setAdresseBien(string $adresseBien): static
    {
        $this->adresseBien = $adresseBien;

        return $this;
    }

    public function getVilleBien(): ?string
    {
        return $this->villeBien;
    }

    public function setVilleBien(string $villeBien): static
    {
        $this->villeBien = $villeBien;

        return $this;
    }

    public function getCpBien(): ?string
    {
        return $this->cpBien;
    }

    public function setCpBien(string $cpBien): static
    {
        $this->cpBien = $cpBien;

        return $this;
    }
}
