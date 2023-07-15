<?php

namespace App\Entity;

use App\Repository\TodolistRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=TodolistRepository::class)
 */
class Todolist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get_todolist"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get_todolist", "get_new_todolist"})
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="todolists")
     * @Groups({"get_todolist"})
     */
    private $make;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"get_todolist" , "get_new_todolist"})
     * @Assert\NotBlank
     */
    private $listing;

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

    public function getMake(): ?User
    {
        return $this->make;
    }

    public function setMake(?User $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getListing(): ?string
    {
        return $this->listing;
    }

    public function setListing(?string $listing): self
    {
        $this->listing = $listing;

        return $this;
    }
    

}
