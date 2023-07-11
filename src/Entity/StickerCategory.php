<?php

namespace App\Entity;

use App\Repository\StickerCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StickerCategoryRepository::class)
 */
class StickerCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Sticker::class, mappedBy="is_about")
     */
    private $stickers;

    public function __construct()
    {
        $this->stickers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Sticker>
     */
    public function getStickers(): Collection
    {
        return $this->stickers;
    }

    public function addSticker(Sticker $sticker): self
    {
        if (!$this->stickers->contains($sticker)) {
            $this->stickers[] = $sticker;
            $sticker->setIsAbout($this);
        }

        return $this;
    }

    public function removeSticker(Sticker $sticker): self
    {
        if ($this->stickers->removeElement($sticker)) {
            // set the owning side to null (unless already changed)
            if ($sticker->getIsAbout() === $this) {
                $sticker->setIsAbout(null);
            }
        }

        return $this;
    }
}
