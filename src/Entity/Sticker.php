<?php

namespace App\Entity;

use App\Repository\StickerRepository;
use App\Entity\StickerItem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StickerRepository::class)
 */
class Sticker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="stickers")
     */
    private $craft;

    /**
     * @ORM\ManyToOne(targetEntity=StickerCategory::class, inversedBy="stickers")
     */
    private $is_about;

    /**
     * @ORM\ManyToMany(targetEntity=StickerItem::class, inversedBy="stickers")
     */
    private $contains;

    public function __construct()
    {
        $this->contains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCraft(): ?User
    {
        return $this->craft;
    }

    public function setCraft(?User $craft): self
    {
        $this->craft = $craft;

        return $this;
    }

    public function getIsAbout(): ?StickerCategory
    {
        return $this->is_about;
    }

    public function setIsAbout(?StickerCategory $is_about): self
    {
        $this->is_about = $is_about;

        return $this;
    }

    /**
     * @return Collection<int, StickerItem>
     */
    public function getContains(): Collection
    {
        return $this->contains;
    }

    public function addContain(StickerItem $contain): self
    {
        if (!$this->contains->contains($contain)) {
            $this->contains[] = $contain;
        }

        return $this;
    }

    public function removeContain(StickerItem $contain): self
    {
        $this->contains->removeElement($contain);

        return $this;
    }


    public function __toString(): string
    {
        return $this->craft;
    }
}
