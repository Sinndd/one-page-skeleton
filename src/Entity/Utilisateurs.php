<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
#[ORM\Table(name: 'utilisateurs')]
class Utilisateurs implements PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private ?string $password = null;

    // Ajoutez ici d'autres propriétés pertinentes de l'utilisateur, comme l'email, le prénom, etc.

    /**
     * Récupère l'identifiant unique de l'utilisateur.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Récupère le nom d'utilisateur ou l'identifiant unique de l'utilisateur.
     * Ceci remplace la méthode `getUsername()`.
     */
    public function getUserIdentifier(): string
    {
        return $this->username ?? '';
    }

    /**
     * Récupère le nom d'utilisateur (ancienne méthode).
     * Cette méthode est encore supportée, mais `getUserIdentifier()` est préférée.
     */
    public function getUsername(): string
    {
        return $this->getUserIdentifier();
    }

    /**
     * Définit le nom d'utilisateur.
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Récupère un tableau des rôles assignés à l'utilisateur.
     */
    public function getRoles(): array
    {
        // Garantir que chaque utilisateur a toujours au moins le rôle ROLE_USER.
        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles, true)) {
            $roles[] = 'ROLE_USER';
        }

        return $roles;
    }

    /**
     * Définit les rôles de l'utilisateur.
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Récupère le mot de passe haché de l'utilisateur.
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Définit le mot de passe haché de l'utilisateur.
     */
    public function setpassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Supprime les données sensibles de l'utilisateur.
     */
    public function eraseCredentials(): void
    {
        // Si vous avez des données temporaires sensibles sur l'utilisateur, effacez-les ici
        // $this->plainPassword = null;
    }

    /**
     * Récupère le sel utilisé pour le hachage des mots de passe.
     * Vous n'avez pas besoin de définir un sel si vous utilisez bcrypt ou argon2i.
     */
    public function getSalt(): ?string
    {
        return null;
    }
}
