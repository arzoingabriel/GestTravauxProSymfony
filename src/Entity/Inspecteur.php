<?php

namespace App\Entity;

use App\Repository\InspecteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InspecteurRepository::class)]
class Inspecteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $telInspecteur = null;

    #[ORM\Column(length: 255)]
    private ?string $secteurInspecteur = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresseInspecteur(): ?string
    {
        return $this->adresseInspecteur;
    }

    public function setAdresseInspecteur(string $adresseInspecteur): static
    {
        $this->adresseInspecteur = $adresseInspecteur;

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

    public function setSecteurInspecteur(string $secteurInspecteur): static
    {
        $this->secteurInspecteur = $secteurInspecteur;

        return $this;
    }
}
