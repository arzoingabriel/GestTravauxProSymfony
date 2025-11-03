<?php

namespace App\Entity;

use App\Repository\EntrepreneurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepreneurRepository::class)]
class Entrepreneur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'entrepreneurs')]
    private Collection $Categorie;

    #[ORM\Column(length: 255)]
    private ?string $villeDeploiment = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEntrepreneur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomEntrepreneur = null;

    #[ORM\Column(length: 255)]
    private ?string $emailEntrepreneur = null;

    #[ORM\Column(length: 255)]
    private ?string $telEntrepreneur = null;

    public function __construct()
    {
        $this->Categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->Categorie;
    }

    public function addCategorie(Categorie $categorie): static
    {
        if (!$this->Categorie->contains($categorie)) {
            $this->Categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): static
    {
        $this->Categorie->removeElement($categorie);

        return $this;
    }

    public function getVilleDeploiment(): ?string
    {
        return $this->villeDeploiment;
    }

    public function setVilleDeploiment(string $villeDeploiment): static
    {
        $this->villeDeploiment = $villeDeploiment;

        return $this;
    }

    public function getNomEntrepreneur(): ?string
    {
        return $this->nomEntrepreneur;
    }

    public function setNomEntrepreneur(string $nomEntrepreneur): static
    {
        $this->nomEntrepreneur = $nomEntrepreneur;

        return $this;
    }

    public function getPrenomEntrepreneur(): ?string
    {
        return $this->prenomEntrepreneur;
    }

    public function setPrenomEntrepreneur(string $prenomEntrepreneur): static
    {
        $this->prenomEntrepreneur = $prenomEntrepreneur;

        return $this;
    }

    public function getEmailEntrepreneur(): ?string
    {
        return $this->emailEntrepreneur;
    }

    public function setEmailEntrepreneur(string $emailEntrepreneur): static
    {
        $this->emailEntrepreneur = $emailEntrepreneur;

        return $this;
    }

    public function getTelEntrepreneur(): ?string
    {
        return $this->telEntrepreneur;
    }

    public function setTelEntrepreneur(string $telEntrepreneur): static
    {
        $this->telEntrepreneur = $telEntrepreneur;

        return $this;
    }
}
