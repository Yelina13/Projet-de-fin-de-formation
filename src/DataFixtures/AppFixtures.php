<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\DBAL\Connection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;


class AppFixtures extends Fixture
{    

    private $connection;
    private $userPasswordHasher;



     public function __construct(
        Connection $connection,
        UserPasswordHasherInterface $userPasswordHasher
       
    )
    {
        // On récupère la connexion à la BDD (DBAL ~= PDO)
        // pour exécuter des requêtes manuelles en SQL pur
        $this->connection = $connection;
        $this->userPasswordHasher = $userPasswordHasher;
     
    }


     /**
     * Permet de TRUNCATE les tables et de remettre les AI à 1
     */
    private function truncate()
    {
        // On passe en mode SQL ! On cause avec MySQL
        // Désactivation la vérification des contraintes FK
        $this->connection->executeQuery('SET foreign_key_checks = 0');
        // On tronque
        $this->connection->executeQuery('TRUNCATE TABLE article');
        $this->connection->executeQuery('TRUNCATE TABLE article_category');
        $this->connection->executeQuery('TRUNCATE TABLE sticker');
        $this->connection->executeQuery('TRUNCATE TABLE sticker_category');
        $this->connection->executeQuery('TRUNCATE TABLE sticker_item');
        $this->connection->executeQuery('TRUNCATE TABLE todolist');
        $this->connection->executeQuery('TRUNCATE TABLE user');
        // etc.
    }    





    public function load(ObjectManager $manager)

    {
  
        // on aimerati "reset" les id de nos données à 1
        // cela est possible avec la commande SQL "TRUNCATE"
        // la commande de fixtures permet de faire un "--purge-with-truncate"
        // sauf qu'on ne peut pas gérer les suppressions en CASCADE
        // donc les contraintes sur les clés étangères s'appliquent et ça ne fonctionne pas

        // on va contourner la chose en créant notre propre TRUNCATE
        $this->truncate();

        // on instancie la librairie Faker, en français
        // @see https://fakerphp.github.io/#localization
        $faker = Factory::create('fr_FR');
        // pour générer les mêmes données à chaque fois, on renseigne la "seed"
        // @see https://fakerphp.github.io/#seeding-the-generator
        // ces chiffres ne correspondent à rien de particulier
        $faker->seed(4586731294);

        // Users
        $admin = new User();
        $admin->setEmail('admin@admin.com');
        $admin->setUsername('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        // Hashage du password avec l'instance 'UserPasswordHasherInterface'
        // récupérée lors de l'appel au constructeur de la classe avec
        // L'injection de dépendances
        $admin->setPassword(
            $this->userPasswordHasher->hashPassword($admin, 'admin')
        );
        $manager->persist($admin);


        $user = new User();
        $user->setEmail('user@user.com');
        $user->setUsername('user');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword($user, 'user')
        );
        $manager->persist($user);
   
        $manager->flush();
    }
}