<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtatRepository::class)
 */
class Etat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle_etat;

    /**
     * @ORM\OneToMany(targetEntity=Bien::class, mappedBy="etat")
     */
    private $biens;

    public function __construct()
    {
        $this->biens = new ArrayCollection();
    }

    public function __toString()
    {
        return ucfirst(trim($this->getLibelleEtat()));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleEtat(): ?string
    {
        return $this->libelle_etat;
    }

    public function setLibelleEtat(string $libelle_etat): self
    {
        $this->libelle_etat = $libelle_etat;

        return $this;
    }

    /**
     * @return Collection|Bien[]
     */
    public function getBiens(): Collection
    {
        return $this->biens;
    }

    public function addBien(Bien $bien): self
    {
        if (!$this->biens->contains($bien)) {
            $this->biens[] = $bien;
            $bien->setEtat($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getEtat() === $this) {
                $bien->setEtat(null);
            }
        }

        return $this;
    }
}
