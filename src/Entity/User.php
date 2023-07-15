<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"get_article", "get_todolist"})
     * @Assert\NotBlank
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     * @Assert\NotBlank
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $password;


    // quand on supprime un utilisateur , on veut que ses articles, ses todolist et ses stickers soient supprimés en même temps
    // pour cela on utilise "cascade={"remove"}"

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="publish", cascade={"remove"})
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=Todolist::class, mappedBy="make",  cascade={"remove"})
     */
    private $todolists;

    /**
     * @ORM\OneToMany(targetEntity=Sticker::class, mappedBy="craft", cascade={"remove"})
     */
    private $stickers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->todolists = new ArrayCollection();
        $this->stickers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
         $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setPublish($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getPublish() === $this) {
                $article->setPublish(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Todolist>
     */
    public function getTodolists(): Collection
    {
        return $this->todolists;
    }

    public function addTodolist(Todolist $todolist): self
    {
        if (!$this->todolists->contains($todolist)) {
            $this->todolists[] = $todolist;
            $todolist->setMake($this);
        }

        return $this;
    }

    public function removeTodolist(Todolist $todolist): self
    {
        if ($this->todolists->removeElement($todolist)) {
            // set the owning side to null (unless already changed)
            if ($todolist->getMake() === $this) {
                $todolist->setMake(null);
            }
        }

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
            $sticker->setCraft($this);
        }

        return $this;
    }

    public function removeSticker(Sticker $sticker): self
    {
        if ($this->stickers->removeElement($sticker)) {
            // set the owning side to null (unless already changed)
            if ($sticker->getCraft() === $this) {
                $sticker->setCraft(null);
            }
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    // Ajout de la fonction magique to_tring car sinon message d'erreur Object of class App\Entity\User could not be converted to string

    public function __toString(): string
    {
        return $this->username;
    }

}
