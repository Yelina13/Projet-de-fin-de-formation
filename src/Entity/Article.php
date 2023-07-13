<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     *
     * 
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * 
     */
    private $overview;

    /**
     * @ORM\Column(type="text")
     *
     * 
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * 
     * 
     */
    private $published_date;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleCategory::class, inversedBy="articles")
     *
     */
    private $is_from;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * 
     */
    private $publish;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublishedDate(): ?\DateTimeInterface
    {
        return $this->published_date;
    }

    public function setPublishedDate(\DateTimeInterface $published_date): self
    {
        $this->published_date = $published_date;

        return $this;
    }

    public function getIsFrom(): ?ArticleCategory
    {
        return $this->is_from;
    }

    public function setIsFrom(?ArticleCategory $is_from): self
    {
        $this->is_from = $is_from;

        return $this;
    }

    public function getPublish(): ?User
    {
        return $this->publish;
    }

    public function setPublish(?User $publish): self
    {
        $this->publish = $publish;

        return $this;
    }
}
