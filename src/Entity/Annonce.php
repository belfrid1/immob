<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
    private $libelle_type;

    /**
     * @ORM\OneToOne(targetEntity=Bien::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleType(): ?string
    {
        return $this->libelle_type;
    }

    public function setLibelleType(string $libelle_type): self
    {
        $this->libelle_type = $libelle_type;

        return $this;
    }

    public function getBien(): ?Bien
    {
        return $this->bien;
    }

    public function setBien(Bien $bien): self
    {
        $this->bien = $bien;

        return $this;
    }
}
