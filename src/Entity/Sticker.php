<?php

namespace App\Entity;

use App\Repository\StickerRepository;
use App\Entity\StickerItem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=StickerRepository::class)
 */
class Sticker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get_sticker", "get_new_sticker"})
     */
    private $id;

 
    //  @Groups({"get_new_sticker"}) SI on met pour craft , il affiche dans imsominia le statut "null" , voir
    //                               si on le remet ou pas .


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="stickers", cascade={"persist"})
     */
    private $craft;

    /**
     * @ORM\ManyToOne(targetEntity=StickerCategory::class, inversedBy="stickers", cascade={"persist"})
     * @Groups({"get_new_sticker","get_sticker", "get_userAll"})
     */
    private $is_about;

    /**
     * @ORM\ManyToMany(targetEntity=StickerItem::class, inversedBy="stickers", cascade={"persist"})
     * @Groups({"get_new_sticker","get_sticker", "get_userAll"})
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
        // Return a string representation of the Sticker object.
        // You can choose what properties or information to include in the string.
        return $this->craft ?? ''; // Assuming the Sticker object has a "name" property
    }
}
