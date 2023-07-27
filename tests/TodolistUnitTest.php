<?php

namespace App\Tests;

use App\Entity\Todolist;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class TodolistUnitTest extends TestCase

{
    public function testIsTrue()
    {
        $todolist = new Todolist();
        $user = new User();

        $todolist->setName('la todolist de michel');
        $todolist->setMake($user);
        $todolist->setListing('sortir le chien , nettoyer les vitres');

        $this->assertTrue($todolist->getName() === 'la todolist de michel');
        $this->assertTrue($todolist->getMake() === $user);
        $this->assertTrue($todolist->getListing() === 'sortir le chien , nettoyer les vitres');
      
    }

    public function testIsFalse()
    {
        $todolist = new Todolist();
        $user = new User();


        $todolist->setName('la todolist de michel');
        $todolist->setMake($user);
        $todolist->setListing('sortir le chien , nettoyer les vitres');
        
        $this->assertFalse($todolist->getName() === 'la todolist de michou');
        $this->assertFalse($todolist->getName() === 'la todolist de michou');
        $this->assertFalse($todolist->getListing() === 'aller faire les courses');
     
    }

    public function testIsEmpty()
    {

    $todolist = new Todolist();

    $this->assertEmpty($todolist->getId());

    }


}
