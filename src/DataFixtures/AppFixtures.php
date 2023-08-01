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
        // pour exécuter des requêtes manuelles en SQL 
        // Connecting to database to send SQL requests
        $this->connection = $connection;
        $this->userPasswordHasher = $userPasswordHasher;
     
    }


     /**
     * Permet de TRUNCATE les tables et de remettre les AI à 1
     * Allowing truncate on tables and auto incrementation starts at 1
     */
    private function truncate()
    {
        // On passe en mode SQL ! On cause avec MySQL
        // Désactivation la vérification des contraintes FK
        // SQL mod, desactivating foreign keys constrains
        $this->connection->executeQuery('SET foreign_key_checks = 0');
        // On tronque
        // Truncate
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
  
        $this->truncate();

        // on instancie la librairie Faker, en français
        // Calling the Faker library, in french
        // @see https://fakerphp.github.io/#localization
        $faker = Factory::create('fr_FR');
        // pour générer les mêmes données à chaque fois, on renseigne la "seed"
        // @see https://fakerphp.github.io/#seeding-the-generator
        // A Seed allows multiple people to generate the same "random" data
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
        // Password hash, done with the class constructor
        $admin->setPassword(
            $this->userPasswordHasher->hashPassword($admin, 'admin')
        );
        $manager->persist($admin);

        // On crée un user "pratique"
        // Creating a "easy-to-use" user
        $user = new User();
        $user->setEmail('user@user.com');
        $user->setUsername('user');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword($user, 'user')
        );
        $manager->persist($user);
   
        // On rajoute quelques users pour avoir de la data
        // Adding a few users to have some datas
                
        $userList = [];
        for ($u = 1; $u <= 25; $u++) { 
        $user = new User();
        $user->setEmail($faker->unique()->email());
        $user->setUsername($faker->unique()->firstName());
        $user->setRoles(['ROLE_USER']);
        $user->setPassword(
        $this->userPasswordHasher->hashPassword($user, 'user')
        );
        $manager->persist($user);
        $userList[] = $user;
        }

        
         
            // On crée une liste de catégories pour les articles
            // Creating a category list for articles
        $articleCategoryList = [];

        for ($ac = 1; $ac <= 25; $ac++) { 
            $articleCategory = new ArticleCategory();
            $articleCategory->setName($faker->word());
            // on persist
            $manager->persist($articleCategory);

            $articleCategoryList[] = $articleCategory;
        }

         // On crée une liste de catégories pour les stickers
         // Creating a category list for stickers
         $stickerCategoryList = [];

         for ($g = 1; $g <=25; $g++) { 
             $stickerCategory = new StickerCategory();
             $stickerCategory->setName($faker->word());
             // on persist
             $manager->persist($stickerCategory);

             $stickerCategoryList[] = $stickerCategory;
         }


          // On crée une liste d'items pour les stickers
          // Creating an item list for stickers
         $stickerItemList = [];

         for ($g = 1; $g <=25; $g++) { 
             $stickerItem = new StickerItem();
             $stickerItem->setName($faker->word());
             $manager->persist($stickerItem);

             $stickerItemList[] = $stickerItem;
         }


       
         $article = [];

         for ($ac = 1; $ac <= 25; $ac++) { 
             $article = new Article();

             $article->setTitle($faker->word());
             $article->setOverview($faker->sentence());
             $article->setContent($faker->text(100));
             $article->setImage('https://picsum.photos/200/200');
             $article->setPublishedDate($faker->dateTime('now'));
             $article->setUpdatedDate($faker->dateTime('now'));


            for ($c = 1; $c <= 25; $c++) {
                $randomArticleCategory = $articleCategoryList[mt_rand(0, count($articleCategoryList) - 1)];

                // on associe
                $article->setIsFrom($randomArticleCategory);
             }
             for ($p = 1; $p <= 25; $p++) {
                $randomArticleAuthor = $userList[mt_rand(0, count($userList) - 1)];

                // on associe
                $article->setPublish($randomArticleAuthor);
             }
             $manager->persist($article);
            }


           
       // Création des stickers / Stickers making
       
           // on crée une entité
           $sticker = new Sticker();
           for ($sc = 1; $sc <= 25; $sc++) {
            $sticker = new Sticker(); // Créer un nouvel objet Sticker à chaque itération
            // Creating a new sticker object for each iteration
        
            $randomStickerCategory = $stickerCategoryList[random_int(0, count($stickerCategoryList) - 1)];
            $sticker->setIsAbout($randomStickerCategory);
            
            // AddContain est utlisé pour affiché les Objets avec la relation ManyTomany 
            // AddContain is used to display objects with the ManyToMany relation
            $randomStickerItem = $stickerItemList[random_int(1, count($stickerItemList)  - 1)];
            $sticker->addContain($randomStickerItem); 


            $randomStickerCreator = $userList[random_int(1, count($userList)  - 1)];
            $sticker->setCraft($randomStickerCreator);
             
                
            $manager->persist($sticker); // Persist the sticker object

               
        }

                for ($ac = 1; $ac <= 25; $ac++) { 
                $todolist = new Todolist;
                $todolist->setName($faker->word());
                $todolist->setListing($faker->text(100));

                for ($cp = 1; $cp <=25; $cp++) {
                    $randomTodolistCreator = $userList[mt_rand(0, count($userList) - 1)];

                    // on associe
                    $todolist->setMake($randomTodolistCreator);
                 }
                 $manager->persist($todolist);

                }      
            
                 $manager->flush();
            }
        } 
        

    
    
        
            
        


