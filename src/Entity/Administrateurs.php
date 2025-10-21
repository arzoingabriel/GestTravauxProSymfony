<?php

namespace App\Entity;

use App\Repository\AdministrateursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateursRepository::class)]
class Administrateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomAdmin = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomAdmin = null;

    #[ORM\Column(length: 255)]
    private ?string $mdpAdministrateur = null;

    #[ORM\Column(length: 255)]
    private ?string $droitAdministrateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdmin(): ?string
    {
        return $this->nomAdmin;
    }

    public function setNomAdmin(string $nomAdmin): static
    {
        $this->nomAdmin = $nomAdmin;

        return $this;
    }

    public function getPrenomAdmin(): ?string
    {
        return $this->prenomAdmin;
    }

    public function setPrenomAdmin(string $prenomAdmin): static
    {
        $this->prenomAdmin = $prenomAdmin;

        return $this;
    }

    public function getMdpAdministrateur(): ?string
    {
        return $this->mdpAdministrateur;
    }

    public function setMdpAdministrateur(string $mdpAdministrateur): static
    {
        $this->mdpAdministrateur = $mdpAdministrateur;

        return $this;
    }

    public function getDroitAdministrateur(): ?string
    {
        return $this->droitAdministrateur;
    }

    public function setDroitAdministrateur(string $droitAdministrateur): static
    {
        $this->droitAdministrateur = $droitAdministrateur;

        return $this;
    }
}
