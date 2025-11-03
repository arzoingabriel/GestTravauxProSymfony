<?php

namespace App\Entity;

use App\Repository\DevisTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisTypeRepository::class)]
class DevisType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Prestation>
     */
    #[ORM\ManyToMany(targetEntity: Prestation::class, inversedBy: 'devisTypes')]
    private Collection $Prestation;

    #[ORM\ManyToOne(inversedBy: 'devisTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chantier $Chantier = null;

    #[ORM\ManyToOne(inversedBy: 'devisTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gestionnaire $Gestionnaire = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    public function __construct()
    {
        $this->Prestation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Prestation>
     */
    public function getPrestation(): Collection
    {
        return $this->Prestation;
    }

    public function addPrestation(Prestation $prestation): static
    {
        if (!$this->Prestation->contains($prestation)) {
            $this->Prestation->add($prestation);
        }

        return $this;
    }

    public function removePrestation(Prestation $prestation): static
    {
        $this->Prestation->removeElement($prestation);

        return $this;
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

    public function getGestionnaire(): ?Gestionnaire
    {
        return $this->Gestionnaire;
    }

    public function setGestionnaire(?Gestionnaire $Gestionnaire): static
    {
        $this->Gestionnaire = $Gestionnaire;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
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
}
