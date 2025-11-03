<?php

namespace App\Entity;

use App\Repository\InspecteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InspecteurRepository::class)]
class Inspecteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Chantier>
     */
    #[ORM\OneToMany(targetEntity: Chantier::class, mappedBy: 'Inspecteur')]
    private Collection $chantiers;

    #[ORM\Column(length: 255)]
    private ?string $nomInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $emailInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $telInspecteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secteurInspecteur = null;

    public function __construct()
    {
        $this->chantiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $chantier->setInspecteur($this);
        }

        return $this;
    }

    public function removeChantier(Chantier $chantier): static
    {
        if ($this->chantiers->removeElement($chantier)) {
            // set the owning side to null (unless already changed)
            if ($chantier->getInspecteur() === $this) {
                $chantier->setInspecteur(null);
            }
        }

        return $this;
    }

    public function getNomInspecteur(): ?string
    {
        return $this->nomInspecteur;
    }

    public function setNomInspecteur(string $nomInspecteur): static
    {
        $this->nomInspecteur = $nomInspecteur;

        return $this;
    }

    public function getPrenomInspecteur(): ?string
    {
        return $this->prenomInspecteur;
    }

    public function setPrenomInspecteur(string $prenomInspecteur): static
    {
        $this->prenomInspecteur = $prenomInspecteur;

        return $this;
    }

    public function getEmailInspecteur(): ?string
    {
        return $this->emailInspecteur;
    }

    public function setEmailInspecteur(string $emailInspecteur): static
    {
        $this->emailInspecteur = $emailInspecteur;

        return $this;
    }

    public function getTelInspecteur(): ?string
    {
        return $this->telInspecteur;
    }

    public function setTelInspecteur(string $telInspecteur): static
    {
        $this->telInspecteur = $telInspecteur;

        return $this;
    }

    public function getSecteurInspecteur(): ?string
    {
        return $this->secteurInspecteur;
    }

    public function setSecteurInspecteur(?string $secteurInspecteur): static
    {
        $this->secteurInspecteur = $secteurInspecteur;

        return $this;
    }
}
