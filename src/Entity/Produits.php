<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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
    private ?\DateTimeInterface $date_ajout = null;

    #[ORM\Column]
    private ?int $categorie_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $artiste_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_principale = null;

    #[ORM\Column]
    private ?bool $en_promotion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): static
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

    public function getCategorieId(): ?int
    {
        return $this->categorie_id;
    }

    public function setCategorieId(int $categorie_id): static
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    public function getArtisteId(): ?int
    {
        return $this->artiste_id;
    }

    public function setArtisteId(?int $artiste_id): static
    {
        $this->artiste_id = $artiste_id;

        return $this;
    }

    public function getImagePrincipale(): ?string
    {
        return $this->image_principale;
    }

    public function setImagePrincipale(?string $image_principale): static
    {
        $this->image_principale = $image_principale;

        return $this;
    }

    public function isEnPromotion(): ?bool
    {
        return $this->en_promotion;
    }

    public function setEnPromotion(bool $en_promotion): static
    {
        $this->en_promotion = $en_promotion;

        return $this;
    }
}
