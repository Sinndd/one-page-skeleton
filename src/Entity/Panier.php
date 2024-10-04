<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateurs::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $utilisateur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\OneToMany(mappedBy: 'panier', targetEntity: LignesCommandes::class, cascade: ['persist', 'remove'])]
    private Collection $lignesCommandes;

    public function __construct()
    {
        $this->lignesCommandes = new ArrayCollection();
        $this->dateCreation = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateurs
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateurs $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return Collection<int, LignesCommandes>
     */
    public function getLignesCommandes(): Collection
    {
        return $this->lignesCommandes;
    }

    public function addLigneCommande(LignesCommandes $ligneCommande): static
    {
        if (!$this->lignesCommandes->contains($ligneCommande)) {
            $this->lignesCommandes->add($ligneCommande);
            $ligneCommande->setPanier($this);
        }
        return $this;
    }

    public function removeLigneCommande(LignesCommandes $ligneCommande): static
    {
        if ($this->lignesCommandes->removeElement($ligneCommande)) {
            if ($ligneCommande->getPanier() === $this) {
                $ligneCommande->setPanier(null);
            }
        }
        return $this;
    }
}
