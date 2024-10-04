<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\ProduitImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Images;
use App\Entity\Produits;

#[ORM\Entity(repositoryClass: ProduitImagesRepository::class)]
class ProduitImages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Produits::class, inversedBy: 'produitImages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produits $produit = null;

    #[ORM\OneToMany(mappedBy: 'produitImages', targetEntity: Images::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $images;

    public function __construct(Produits $produit)
    {
        $this->produit = $produit;
        $this->images = new ArrayCollection();
    }

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

    public function addImage(Images $image): void
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setProduitImages($this); // Associer l'image à ProduitImages
        }
    }

    public function removeImage(Images $image): void
    {
        if ($this->images->removeElement($image)) {
            // Vérifie si l'image était associée à ce produit avant de la dissocier
            if ($image->getProduitImages() === $this) {
                $image->setProduitImages(null); // Dissocier l'image du produit
            }
        }
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }
}
