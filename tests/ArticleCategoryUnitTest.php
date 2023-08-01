<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use PHPUnit\Framework\TestCase;





/**
 * Pour les Tests unitaires , 3 methodes ("testIsTrue vérifie que la condition passée en paramètre est vraie. ,testIsFalse vérifie que la condition passée en paramètre est fausse. et TestIsempty pour vérifier que la valeur est bien vide ")
 * On utilise pour cela les assertions avec Get et Set pour les Entity 
 * Dashboard installé avec PhpUnit Coverage, pour avoir un visuel plus structuré de l'avancement des tests .
 */
class ArticleCategoryUnitTest extends TestCase

{
    public function testIsTrue()
    {
        $articleCategory = new ArticleCategory();

        $articleCategory->setName('thriller');

        $this->assertTrue($articleCategory->getName() === 'thriller');
      
    }

    public function testIsFalse()
    {
        $articleCategory = new ArticleCategory();

        $articleCategory->setName('Polar');
        
        $this->assertFalse($articleCategory->getName() === 'Blog');
     
    }

    public function testIsEmpty()
    {

    $articleCategory = new ArticleCategory();

    $this->assertEmpty($articleCategory->getName());
    $this->assertEmpty($articleCategory->getId());

    }

    public function testAddGetRemoveArticles(): void
    {
        $articleCategory = new ArticleCategory();
        $articles = new Article();

        $this->assertEmpty($articleCategory->getArticles());

        $articleCategory->addArticle($articles);
        $this->assertContains($articles, $articleCategory->getArticles());

        $articleCategory->removeArticle($articles);
        $this->assertEmpty($articleCategory->getArticles());
       
    }

  
}