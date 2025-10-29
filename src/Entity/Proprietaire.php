<?php

namespace App\Entity;

use App\Repository\ProprietaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProprietaireRepository::class)]
class Proprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Bien>
     */
    #[ORM\OneToMany(targetEntity: Bien::class, mappedBy: 'Proprietaire')]
    private Collection $biens;

    #[ORM\Column(length: 255)]
    private ?string $nomProprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomProprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $emailProprietaire = null;

    #[ORM\Column(length: 255)]
    private ?string $telProprietaire = null;

    public function __construct()
    {
        $this->biens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Bien>
     */
    public function getBiens(): Collection
    {
        return $this->biens;
    }

    public function addBien(Bien $bien): static
    {
        if (!$this->biens->contains($bien)) {
            $this->biens->add($bien);
            $bien->setProprietaire($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): static
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getProprietaire() === $this) {
                $bien->setProprietaire(null);
            }
        }

        return $this;
    }

    public function getNomProprietaire(): ?string
    {
        return $this->nomProprietaire;
    }

    public function setNomProprietaire(string $nomProprietaire): static
    {
        $this->nomProprietaire = $nomProprietaire;

        return $this;
    }

    public function getPrenomProprietaire(): ?string
    {
        return $this->prenomProprietaire;
    }

    public function setPrenomProprietaire(string $prenomProprietaire): static
    {
        $this->prenomProprietaire = $prenomProprietaire;

        return $this;
    }

    public function getEmailProprietaire(): ?string
    {
        return $this->emailProprietaire;
    }

    public function setEmailProprietaire(string $emailProprietaire): static
    {
        $this->emailProprietaire = $emailProprietaire;

        return $this;
    }

    public function getTelProprietaire(): ?string
    {
        return $this->telProprietaire;
    }

    public function setTelProprietaire(string $telProprietaire): static
    {
        $this->telProprietaire = $telProprietaire;

        return $this;
    }
}
