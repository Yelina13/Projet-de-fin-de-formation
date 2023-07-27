<?php

namespace App\Tests;

use App\Entity\Sticker;
use App\Entity\StickerCategory;
use App\Entity\StickerItem;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class StickerUnitTest extends TestCase

{
    public function testIsTrue()
    {
        $sticker = new Sticker();
        $user = new User();
        $stickerCategory = new StickerCategory();
      


        $sticker->setCraft($user);
        $sticker->setIsAbout($stickerCategory);
       

        $this->assertTrue($sticker->getCraft() === $user);
        $this->assertTrue($sticker->getIsAbout() === $stickerCategory);
      
      
    }

    public function testIsFalse()
    {
        $sticker = new Sticker();
        $user = new User();
        $stickerCategory = new StickerCategory();
      


        $sticker->setCraft($user);
        $sticker->setIsAbout($stickerCategory);
        
        $this->assertFalse($sticker->getCraft() === 'michel');
        $this->assertFalse($sticker->getIsAbout() === 'une category');
     
     
    }

    public function testIsEmpty()
    {

    $sticker = new Sticker();

    $this->assertEmpty($sticker->getId());

    }

    public function testAddGetRemoveContains(): void
    {
       
        $sticker = new Sticker();
        $contain = new StickerItem();
      

        $this->assertEmpty($sticker->getContains());

        $sticker->addContain($contain);
        $this->assertContains( $contain, $sticker->getContains());

        $sticker->removeContain($contain);
        $this->assertEmpty($sticker->getContains());
       

    }


}
