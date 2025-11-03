<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chantier $Chantier = null;

    #[ORM\Column(length: 255)]
    private ?string $idPhoto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChantier(): ?Chantier
    {
        return $this->Chantier;
    }

    public function setChantier(?Chantier $Chantier): static
    {
        $this->Chantier = $Chantier;

        return $this;
    }

    public function getIdPhoto(): ?string
    {
        return $this->idPhoto;
    }

    public function setIdPhoto(string $idPhoto): static
    {
        $this->idPhoto = $idPhoto;

        return $this;
    }
}
