<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use DateTime;
use PHPUnit\Framework\TestCase;

class ArticleUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $article = new Article();
        $articleCategory = new ArticleCategory();

        $DateTime = new DateTime(); // Datetime ne foncionnait pas sans cette variable avec la classe DateTime en faisant le Test avec True 

        $article->setTitle('le déménagement de michel')
                ->setOverview('comment va se passer son démangement')
                ->setContent('il était une fois le déménagement de michel etc....')
                ->setIsFrom($articleCategory)
                ->setPublisheddate($DateTime)
                ->setImage('image')
                ->setUpdatedDate($DateTime);

        $this->assertTrue($article->getTitle() === 'le déménagement de michel');
        $this->assertTrue($article->getOverview() === 'comment va se passer son démangement');
        $this->assertTrue($article->getContent() === 'il était une fois le déménagement de michel etc....');
        $this->assertTrue($article->getPublishedDate() === $DateTime);
        $this->assertTrue($article->getIsFrom() === $articleCategory);
        $this->assertTrue($article->getImage() === ('image'));
        $this->assertTrue($article->getUpdatedDate() === $DateTime);
    }


        public function testIsFalse()
    {
        $article = new Article();

        $article->setTitle('le déménagement de michel')
                ->setOverview('comment va se passer son démangement')
                ->setContent('il était une fois le déménagement de michel etc....')
                ->setPublisheddate(new \DateTime('now'));


        $this->assertFalse($article->getTitle() === 'le déménagement de michou');
        $this->assertFalse($article->getOverview() === 'comment va se passer la brocante');
        $this->assertFalse($article->getContent() === 'il était une fois la borcante de michel etc....');
        $this->assertFalse($article->getPublishedDate() === new \DateTime('now'));
    }   


    public function testIsEmpty()

    {
        $article = new Article();

        $this->assertEmpty($article->gettitle());
        $this->assertEmpty($article->getOverview());
        $this->assertEmpty($article->getContent());
        $this->assertEmpty($article->getPublishedDate());
        $this->assertEmpty($article->getId());
    }
}
