<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomAdmin = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomAdmin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mdpAdmin = null;

    #[ORM\Column(length: 255)]
    private ?string $droitAdmin = null;

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

    public function getMdpAdmin(): ?string
    {
        return $this->mdpAdmin;
    }

    public function setMdpAdmin(?string $mdpAdmin): static
    {
        $this->mdpAdmin = $mdpAdmin;

        return $this;
    }

    public function getDroitAdmin(): ?string
    {
        return $this->droitAdmin;
    }

    public function setDroitAdmin(string $droitAdmin): static
    {
        $this->droitAdmin = $droitAdmin;

        return $this;
    }
}
