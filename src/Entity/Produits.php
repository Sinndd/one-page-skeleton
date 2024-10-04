<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\ProduitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Categories;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAjout = null;

    #[ORM\ManyToOne(targetEntity: Categories::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categorie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagePrincipale = null;

    #[ORM\Column]
    private ?bool $enPromotion = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: ProduitImages::class, cascade: ['persist', 'remove'])]
    private Collection $produitImages;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: ProduitPromotions::class, cascade: ['persist', 'remove'])]
    private Collection $produitPromotions;

    public function __construct()
    {
        $this->produitImages = new ArrayCollection();
        $this->produitPromotions = new ArrayCollection();
        $this->dateAjout = new \DateTime();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function setImagePrincipale(?string $imagePrincipale): static
    {
        $this->imagePrincipale = $imagePrincipale;

        return $this;
    }

    public function isEnPromotion(): ?bool
    {
        return $this->enPromotion;
    }

    public function setEnPromotion(bool $enPromotion): static
    {
        $this->enPromotion = $enPromotion;

        return $this;
    }

    /**
     * @return Collection<int, ProduitImages>
     */
    public function getProduitImages(): Collection
    {
        return $this->produitImages;
    }

    /**
     * @return Collection<int, ProduitPromotions>
     */
    public function getProduitPromotions(): Collection
    {
        return $this->produitPromotions;
    }
}
