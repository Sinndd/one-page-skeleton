<?php
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Utilisateurs;

class UtilisateursService
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function createUser(Utilisateurs $utilisateur, string $plainPassword): Utilisateurs
    {
        // Hash le mot de passe en utilisant le hasher
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur, $plainPassword);
        $utilisateur->setpassword($hashedPassword);

        // Sauvegardez ensuite l'utilisateur dans la base de données
        // $this->entityManager->persist($utilisateur);
        // $this->entityManager->flush();

        return $utilisateur;
    }
}
