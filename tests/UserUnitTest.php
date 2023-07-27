<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Sticker;
use App\Entity\Todolist;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setUsername('michel')
             ->setRoles(['ROLE_USER'])
             ->setPassword('123456')
             ->setEmail('michel@gmail.com');


        $this->assertTrue($user->getUserIdentifier() === 'michel');
        $this->assertTrue($user->getRoles() === ['ROLE_USER']);
        $this->assertTrue($user->getPassword() === '123456');
        $this->assertTrue($user->getEmail() === 'michel@gmail.com');
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setUsername('michel')
             ->setRoles(['ROLE_USER'])
             ->setPassword('123456')
             ->setEmail('michel@gmail.com');


        $this->assertFalse($user->getUsername() === 'michou');
        $this->assertFalse($user->getRoles() === ['ROLE_ADMIN']);
        $this->assertFalse($user->getPassword() === '12345678');
        $this->assertFalse($user->getEmail() === 'michou@gmail.com');
    }

    public function testIsEmpty(): void
    {
        $user = new User();


        $this->assertEmpty($user->getUserIdentifier());
       // $this->assertEmpty($user->getRoles());      Tous les utilisateurs ont $roles[] = 'ROLE_USER' de base pour garantir une sécurité de notre back-office;
       // $this->assertEmpty($user->getPassword());  * @Assert\NotBlank 
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getId());
        $this->assertEmpty($user->getSalt());
        $this->assertEmpty($user->eraseCredentials()); 
        

    }

    public function testAddGetRemoveArticles(): void
    {
        $user = new User();
        $articles = new Article();

        $this->assertEmpty($user->getArticles());

        $user->addArticle($articles);
        $this->assertContains($articles, $user->getArticles());

        $user->removeArticle($articles);
        $this->assertEmpty($user->getArticles());
       

    }


    public function testAddGetRemoveTodolist(): void
    {
        $user = new User();
        $todolist = new Todolist();

        $this->assertEmpty($user->getTodolists());

        $user->addTodolist($todolist);
        $this->assertContains($todolist, $user->getTodolists());

        $user->removeTodolist($todolist);
        $this->assertEmpty($user->getTodolists());
       

    }

    public function testAddGetRemoveSticker(): void
    {
        $user = new User();
        $Sticker = new Sticker();

        $this->assertEmpty($user->getStickers());

        $user->addSticker($Sticker);
        $this->assertContains($Sticker, $user->getStickers());

        $user->removeSticker($Sticker);
        $this->assertEmpty($user->getStickers());
       

    }


}
