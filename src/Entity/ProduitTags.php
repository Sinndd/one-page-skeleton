<?php

namespace App\Entity;

use App\Repository\ProduitTagsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitTagsRepository::class)]
class ProduitTags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $produit_id = null;

    #[ORM\Column]
    private ?int $tag_id = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTagId(): ?int
    {
        return $this->tag_id;
    }

    public function setTagId(int $tag_id): static
    {
        $this->tag_id = $tag_id;

        return $this;
    }
}
