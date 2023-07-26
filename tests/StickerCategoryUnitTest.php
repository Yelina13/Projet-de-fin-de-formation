<?php

namespace App\Tests;

use App\Entity\Sticker;
use App\Entity\StickerCategory;
use PHPUnit\Framework\TestCase;

class StickerCategoryUnitTest extends TestCase

{
    public function testIsTrue()
    {
        $stickerCategory = new StickerCategory();

      
        $stickerCategory->setName('chambre');
       
        $this->assertTrue($stickerCategory->getName() === 'chambre');
      
      
    }

    public function testIsFalse()
    {
        $stickerCategory = new StickerCategory();

      
        $stickerCategory->setName('chambre');
       
        $this->assertFalse($stickerCategory->getName() === 'salon');
     
     
    }

    public function testIsEmpty()
    {

    $stickerCategory = new stickerCategory();

    $this->assertEmpty($stickerCategory->getId());

    }

    public function testAddGetRemoveSticker(): void
    {
       
        $stickerCategory = new stickerCategory();
        $sticker = new Sticker();
      

        $this->assertEmpty($stickerCategory->getStickers());

        $stickerCategory->addSticker($sticker);
        $this->assertContains( $sticker, $stickerCategory->getStickers());

        $stickerCategory->removeSticker($sticker);
        $this->assertEmpty($stickerCategory->getStickers());
       

    }


}
