<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\ProduitPromotionsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Promotions;
use App\Entity\Produits;

#[ORM\Entity(repositoryClass: ProduitPromotionsRepository::class)]
class ProduitPromotions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Produits::class, inversedBy: 'produitPromotions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produits $produit = null;

    #[ORM\ManyToOne(targetEntity: Promotions::class, inversedBy: 'produitPromotions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Promotions $promotion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produits
    {
        return $this->produit;
    }

    public function setProduit(Produits $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getPromotion(): ?Promotions
    {
        return $this->promotion;
    }

    public function setPromotion(Promotions $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }
}
