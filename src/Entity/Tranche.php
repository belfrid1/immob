<?php

namespace App\Entity;

use App\Repository\TrancheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrancheRepository::class)
 */
class Tranche
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_min;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_max;

    /**
     * @ORM\OneToMany(targetEntity=Bien::class, mappedBy="tranche")
     */
    private $biens;

    public function __toString()
    {
        return number_format($this->getPrixMin(), 0, ',', ' ') . ' - ' . number_format($this->getPrixMax(), 0, ',', ' ') . ' ' .  '(FCFA)';
    }

    public function __construct()
    {
        $this->biens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixMin(): ?int
    {
        return $this->prix_min;
    }

    public function setPrixMin(int $prix_min): self
    {
        $this->prix_min = $prix_min;

        return $this;
    }

    public function getPrixMax(): ?int
    {
        return $this->prix_max;
    }

    public function setPrixMax(int $prix_max): self
    {
        $this->prix_max = $prix_max;

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
            $bien->setTranche($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getTranche() === $this) {
                $bien->setTranche(null);
            }
        }

        return $this;
    }
}
