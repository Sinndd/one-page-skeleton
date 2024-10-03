<?php

namespace App\Entity;

use App\Repository\PanierProduitsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierProduitsRepository::class)]
class PanierProduits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $panier_id = null;

    #[ORM\Column]
    private ?int $produit_id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanierId(): ?int
    {
        return $this->panier_id;
    }

    public function setPanierId(int $panier_id): static
    {
        $this->panier_id = $panier_id;

        return $this;
    }

    public function getProduitId(): ?int
    {
        return $this->produit_id;
    }

    public function setProduitId(int $produit_id): static
    {
        $this->produit_id = $produit_id;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }
}
