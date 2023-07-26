<?php

namespace App\Entity;

use App\Repository\StickerItemRepository;
use App\Entity\Sticker;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=StickerItemRepository::class)
 */
class StickerItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get_new_sticker", "get_stickerItem"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"get_new_sticker","get_sticker", "get_userAll", "get_stickerItem"})
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Sticker::class, mappedBy="contains")
     * 
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
            $sticker->addContain($this);
        }

        return $this;
    }

    public function removeSticker(Sticker $sticker): self
    {
        if ($this->stickers->removeElement($sticker)) {
            $sticker->removeContain($this);
        }

        return $this;
    }

        // Ajout de la fonction magique to_tring car sinon message d'erreur Object of class App\Entity\StickerCategory could not be converted to string

        public function __toString(): string
        {
            return $this->name;
        }
    
}
