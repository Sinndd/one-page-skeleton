<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Produits;
use App\Entity\ProduitImages;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Produits::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produits $produit = null;

    #[ORM\Column(length: 255)]
    private ?string $urlImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    // Ajout de la propriété produitImages
    #[ORM\ManyToOne(targetEntity: ProduitImages::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: true)]
    private ?ProduitImages $produitImages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produits
    {
        return $this->produit;
    }

    public function setProduit(?Produits $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): static
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    // Méthode pour obtenir l'objet ProduitImages associé
    public function getProduitImages(): ?ProduitImages
    {
        return $this->produitImages;
    }

    // Méthode pour définir l'objet ProduitImages associé
    public function setProduitImages(?ProduitImages $produitImages): static
    {
        $this->produitImages = $produitImages;

        return $this;
    }
}
