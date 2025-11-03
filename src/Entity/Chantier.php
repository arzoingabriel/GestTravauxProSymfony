<?php

namespace App\Entity;

use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChantierRepository::class)]
class Chantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'chantiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bien $Bien = null;

    #[ORM\ManyToOne(inversedBy: 'chantiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Inspecteur $Inspecteur = null;

    /**
     * @var Collection<int, Photo>
     */
    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: 'Chantier')]
    private Collection $photos;

    /**
     * @var Collection<int, DevisType>
     */
    #[ORM\OneToMany(targetEntity: DevisType::class, mappedBy: 'Chantier')]
    private Collection $devisTypes;

    #[ORM\Column(length: 255)]
    private ?string $villeChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $cpChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $infoChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $statutChantier = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->devisTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBien(): ?Bien
    {
        return $this->Bien;
    }

    public function setBien(?Bien $Bien): static
    {
        $this->Bien = $Bien;

        return $this;
    }

    public function getInspecteur(): ?Inspecteur
    {
        return $this->Inspecteur;
    }

    public function setInspecteur(?Inspecteur $Inspecteur): static
    {
        $this->Inspecteur = $Inspecteur;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setChantier($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getChantier() === $this) {
                $photo->setChantier(null);
            }
        }

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
            $devisType->setChantier($this);
        }

        return $this;
    }

    public function removeDevisType(DevisType $devisType): static
    {
        if ($this->devisTypes->removeElement($devisType)) {
            // set the owning side to null (unless already changed)
            if ($devisType->getChantier() === $this) {
                $devisType->setChantier(null);
            }
        }

        return $this;
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

    public function getCpChantier(): ?string
    {
        return $this->cpChantier;
    }

    public function setCpChantier(string $cpChantier): static
    {
        $this->cpChantier = $cpChantier;

        return $this;
    }

    public function getInfoChantier(): ?string
    {
        return $this->infoChantier;
    }

    public function setInfoChantier(string $infoChantier): static
    {
        $this->infoChantier = $infoChantier;

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
}
