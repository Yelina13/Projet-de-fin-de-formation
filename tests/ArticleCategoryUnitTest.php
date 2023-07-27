<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use PHPUnit\Framework\TestCase;

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