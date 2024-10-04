<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\PromotionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionsRepository::class)]
class Promotions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?float $reduction = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\OneToMany(mappedBy: 'promotion', targetEntity: ProduitPromotions::class, cascade: ['persist', 'remove'])]
    private Collection $produitPromotions;

    public function __construct()
    {
        $this->produitPromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(float $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection<int, ProduitPromotions>
     */
    public function getProduitPromotions(): Collection
    {
        return $this->produitPromotions;
    }

    public function addProduitPromotion(ProduitPromotions $produitPromotion): static
    {
        if (!$this->produitPromotions->contains($produitPromotion)) {
            $this->produitPromotions->add($produitPromotion);
            $produitPromotion->setPromotion($this);
        }

        return $this;
    }

    public function removeProduitPromotion(ProduitPromotions $produitPromotion): static
    {
        if ($this->produitPromotions->removeElement($produitPromotion)) {
            // set the owning side to null (unless already changed)
            if ($produitPromotion->getPromotion() === $this) {
                $produitPromotion->setPromotion(null);
            }
        }

        return $this;
    }
}
