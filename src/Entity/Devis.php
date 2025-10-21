<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    private ?chantiers $PRESTATIONS_idPrestation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPRESTATIONSIdPrestation(): ?chantiers
    {
        return $this->PRESTATIONS_idPrestation;
    }

    public function setPRESTATIONSIdPrestation(?chantiers $PRESTATIONS_idPrestation): static
    {
        $this->PRESTATIONS_idPrestation = $PRESTATIONS_idPrestation;

        return $this;
    }
}
