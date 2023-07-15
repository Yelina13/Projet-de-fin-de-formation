<?php

namespace App\DataFixtures;
use App\DataFixtures\Provider\OpackProvider;
use App\Entity\Article;
use App\Entity\ArticleCategory;
use App\Entity\Sticker;
use App\Entity\StickerCategory;
use App\Entity\StickerItem;
use App\Entity\Todolist;
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
        // pour exécuter des requêtes manuelles en SQL (est ce qu'il faut laisser ça ???? est ce qu'on sert bien ??)
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


        $faker->addProvider(new OpackProvider());

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

        // On crée un user "pratique"
        $user = new User();
        $user->setEmail('user@user.com');
        $user->setUsername('user');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword($user, 'user')
        );
        $manager->persist($user);
   
        // On rajoute quelques users pour avoir de la data
                
        $userList = [];
        for ($u = 1; $u <= 10; $u++) { 
        $user = new User();
        $user->setEmail($faker->email());
        $user->setUsername($faker->firstName());
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
        $this->userPasswordHasher->hashPassword($user, 'user')
        );
        $manager->persist($user);
        $userList[] = $user;
        }

        
         
            // On crée une liste de catégories pour les articles
        $articleCategoryList = [];

        for ($ac = 1; $ac <= 10; $ac++) { 
            $articleCategory = new ArticleCategory();
            $articleCategory->setName($faker->word());
            // on persist
            $manager->persist($articleCategory);

            $articleCategoryList[] = $articleCategory;
        }

         // On crée une liste de catégories pour les stickers
         $stickerCategoryList = [];

         for ($g = 1; $g <=10; $g++) { 
             $stickerCategory = new StickerCategory();
             $stickerCategory->setName($faker->word());
             // on persist
             $manager->persist($stickerCategory);

             $stickerCategoryList[] = $stickerCategory;
         }


          // On crée une liste d'items pour les stickers
         $stickerItemList = [];

         for ($g = 1; $g <=10; $g++) { 
             $stickerItem = new StickerItem();
             $stickerItem->setName($faker->word());
             $manager->persist($stickerItem);

             $stickerItemList[] = $stickerItem;
         }


       
         $article = [];

         for ($ac = 1; $ac <= 10; $ac++) { 
             $article = new Article();

             $article->setTitle($faker->word());
             $article->setOverview($faker->sentence());
             $article->setContent($faker->text(100));
             $article->setPublishedDate($faker->dateTime('now'));


            for ($c = 1; $c <= 10; $c++) {
                $randomArticleCategory = $articleCategoryList[mt_rand(0, count($articleCategoryList) - 1)];

                // on associe
                $article->setIsFrom($randomArticleCategory);
             }
             for ($p = 1; $p <= 10; $p++) {
                $randomArticleAuthor = $userList[mt_rand(0, count($userList) - 1)];

                // on associe
                $article->setPublish($randomArticleAuthor);
             }
             $manager->persist($article);
            }


           
       // Création des stickers
       
           // on crée une entité
           $sticker = new Sticker();
           for ($sc = 1; $sc <= 10; $sc++) {
            $sticker = new Sticker(); // Créer un nouvel objet Sticker à chaque itération
        
            $randomStickerCategory = $stickerCategoryList[random_int(0, count($stickerCategoryList) - 1)];
            $sticker->setIsAbout($randomStickerCategory);
            
            // AddContain est utlisé pour affiché les Objets avec la fonction ManyTomany 
            $randomStickerItem = $stickerItemList[random_int(1, count($stickerItemList)  - 1)];
            $sticker->addContain($randomStickerItem); 


            $randomStickerCreator = $userList[random_int(1, count($userList)  - 1)];
            $sticker->setCraft($randomStickerCreator);
             
                
            $manager->persist($sticker); // Persist the sticker object

               
        }

                for ($ac = 1; $ac <= 10; $ac++) { 
                $todolist = new Todolist;
                $todolist->setName($faker->word());
                $todolist->setListing($faker->text(100));

                for ($cp = 1; $cp <=10; $cp++) {
                    $randomTodolistCreator = $userList[mt_rand(0, count($userList) - 1)];

                    // on associe
                    $todolist->setMake($randomTodolistCreator);
                 }
                 $manager->persist($todolist);

                }      
            
                 $manager->flush();
            }
        } 
        

    
    
        
            
        


