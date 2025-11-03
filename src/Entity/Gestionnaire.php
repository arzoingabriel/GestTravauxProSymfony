<?php

namespace App\Entity;

use App\Repository\GestionnaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GestionnaireRepository::class)]
class Gestionnaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, DevisType>
     */
    #[ORM\OneToMany(targetEntity: DevisType::class, mappedBy: 'Gestionnaire')]
    private Collection $devisTypes;

    #[ORM\Column(length: 255)]
    private ?string $nomGestionnaire = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomGestionnaire = null;

    #[ORM\Column(length: 255)]
    private ?string $emailGestionnaire = null;

    #[ORM\Column(length: 255)]
    private ?string $telGestionnaire = null;

    public function __construct()
    {
        $this->devisTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, DevisType>
     */
    public function getDevisTypes(): Collection
    {
        return $this->devisTypes;
    }

    public function addDevisType(DevisType $devisType): static
    {
        if (!$this->devisTypes->contains($devisType)) {
            $this->devisTypes->add($devisType);
            $devisType->setGestionnaire($this);
        }

        return $this;
    }

    public function removeDevisType(DevisType $devisType): static
    {
        if ($this->devisTypes->removeElement($devisType)) {
            // set the owning side to null (unless already changed)
            if ($devisType->getGestionnaire() === $this) {
                $devisType->setGestionnaire(null);
            }
        }

        return $this;
    }

    public function getNomGestionnaire(): ?string
    {
        return $this->nomGestionnaire;
    }

    public function setNomGestionnaire(string $nomGestionnaire): static
    {
        $this->nomGestionnaire = $nomGestionnaire;

        return $this;
    }

    public function getPrenomGestionnaire(): ?string
    {
        return $this->prenomGestionnaire;
    }

    public function setPrenomGestionnaire(string $prenomGestionnaire): static
    {
        $this->prenomGestionnaire = $prenomGestionnaire;

        return $this;
    }

    public function getEmailGestionnaire(): ?string
    {
        return $this->emailGestionnaire;
    }

    public function setEmailGestionnaire(string $emailGestionnaire): static
    {
        $this->emailGestionnaire = $emailGestionnaire;

        return $this;
    }

    public function getTelGestionnaire(): ?string
    {
        return $this->telGestionnaire;
    }

    public function setTelGestionnaire(string $telGestionnaire): static
    {
        $this->telGestionnaire = $telGestionnaire;

        return $this;
    }
}
