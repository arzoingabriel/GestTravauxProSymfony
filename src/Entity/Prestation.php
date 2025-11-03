<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestationRepository::class)]
class Prestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Devis>
     */
    #[ORM\ManyToMany(targetEntity: Devis::class, inversedBy: 'prestations')]
    private Collection $Devis;

    #[ORM\ManyToOne(inversedBy: 'prestations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $Categorie = null;

    /**
     * @var Collection<int, DevisType>
     */
    #[ORM\ManyToMany(targetEntity: DevisType::class, mappedBy: 'Prestation')]
    private Collection $devisTypes;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    public function __construct()
    {
        $this->Devis = new ArrayCollection();
        $this->devisTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Devis>
     */
    public function getDevis(): Collection
    {
        return $this->Devis;
    }

    public function addDevi(Devis $devi): static
    {
        if (!$this->Devis->contains($devi)) {
            $this->Devis->add($devi);
        }

        return $this;
    }

    public function removeDevi(Devis $devi): static
    {
        $this->Devis->removeElement($devi);

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;

        return $this;
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
            $devisType->addPrestation($this);
        }

        return $this;
    }

    public function removeDevisType(DevisType $devisType): static
    {
        if ($this->devisTypes->removeElement($devisType)) {
            $devisType->removePrestation($this);
        }

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }
}
