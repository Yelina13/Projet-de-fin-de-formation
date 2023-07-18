<?php

namespace App\Entity;

use App\Repository\StickerCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=StickerCategoryRepository::class)
 */
class StickerCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get_new_sticker"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"get_sticker", "get_new_sticker", "get_userAll"})
     */
    private $name;

    /**
     * mise en place de la cascade car sinon on ne peut pas supprimer une categorie etiquette !
     * 
     * @ORM\OneToMany(targetEntity=Sticker::class, mappedBy="is_about", cascade={"remove"}) 
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

       // Ajout de la fonction magique to_tring car sinon message d'erreur Object of class App\Entity\UserCategory could not be converted to string

       public function __toString(): string
       {
           return $this->name;
       }
}
