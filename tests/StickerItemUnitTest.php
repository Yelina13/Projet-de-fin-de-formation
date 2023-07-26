<?php

namespace App\Tests;

use App\Entity\Sticker;
use App\Entity\StickerItem;
use PHPUnit\Framework\TestCase;

class StickerItemUnitTest extends TestCase

{
    public function testIsTrue()
    {
        $stickerItem = new StickerItem();

      
        $stickerItem->setName('moulinette');
       
        $this->assertTrue($stickerItem->getName() === 'moulinette');
      
      
    }

    public function testIsFalse()
    {
        $stickerItem = new StickerItem();

      
        $stickerItem->setName('moulinette');
       
        $this->assertFalse($stickerItem->getName() === 'papinette');
     
     
    }

    public function testIsEmpty()
    {

    $stickerItem = new stickerItem();

    $this->assertEmpty($stickerItem->getId());

    }

    public function testAddGetRemoveSticker(): void
    {
       
        $stickerItem = new stickerItem();
        $sticker = new Sticker();
      

        $this->assertEmpty($stickerItem->getStickers());

        $stickerItem->addSticker($sticker);
        $this->assertContains( $sticker, $stickerItem->getStickers());

        $stickerItem->removeSticker($sticker);
        $this->assertEmpty($stickerItem->getStickers());
       

    }


}
