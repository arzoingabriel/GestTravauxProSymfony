<?php

namespace App\Entity;

use App\Repository\ChantiersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChantiersRepository::class)]
class Chantiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $villeChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $infoChantiers = null;

    #[ORM\Column(length: 255)]
    private ?string $statutChantier = null;

    /**
     * @var Collection<int, Devis>
     */
    #[ORM\OneToMany(targetEntity: Devis::class, mappedBy: 'PRESTATIONS_idPrestation')]
    private Collection $devis;

    public function __construct()
    {
        $this->devis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleChantier(): ?string
    {
        return $this->villeChantier;
    }

    public function setVilleChantier(string $villeChantier): static
    {
        $this->villeChantier = $villeChantier;

        return $this;
    }

    public function getAdresseChantier(): ?string
    {
        return $this->adresseChantier;
    }

    public function setAdresseChantier(string $adresseChantier): static
    {
        $this->adresseChantier = $adresseChantier;

        return $this;
    }

    public function getInfoChantiers(): ?string
    {
        return $this->infoChantiers;
    }

    public function setInfoChantiers(string $infoChantiers): static
    {
        $this->infoChantiers = $infoChantiers;

        return $this;
    }

    public function getStatutChantier(): ?string
    {
        return $this->statutChantier;
    }

    public function setStatutChantier(string $statutChantier): static
    {
        $this->statutChantier = $statutChantier;

        return $this;
    }

    /**
     * @return Collection<int, Devis>
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevi(Devis $devi): static
    {
        if (!$this->devis->contains($devi)) {
            $this->devis->add($devi);
            $devi->setPRESTATIONSIdPrestation($this);
        }

        return $this;
    }

    public function removeDevi(Devis $devi): static
    {
        if ($this->devis->removeElement($devi)) {
            // set the owning side to null (unless already changed)
            if ($devi->getPRESTATIONSIdPrestation() === $this) {
                $devi->setPRESTATIONSIdPrestation(null);
            }
        }

        return $this;
    }
}
