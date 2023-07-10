<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\String_;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $googleId = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebookId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedinId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $twitterId = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Post::class, orphanRemoval: true)]
    private Collection $posts;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $facebookPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebookExpirationTime = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $TwitterPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TwitterExpirationTime = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $LinkedinPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LinkedinExpirationTime = null;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
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

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getGoogleId(): ?string
    {
        return $this->googleId;
    }

    public function setGoogleId(?string $googleId): static
    {
        $this->googleId = $googleId;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getFacebookId(): ?string
    {
        return $this->facebookId;
    }

    public function setFacebookId(?string $facebookId): static
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    public function getLinkedinId(): ?string
    {
        return $this->linkedinId;
    }

    public function setLinkedinId(?string $linkedinId): static
    {
        $this->linkedinId = $linkedinId;

        return $this;
    }

    public function getTwitterId(): ?string
    {
        return $this->twitterId;
    }

    public function setTwitterId(?string $twitterId): static
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setUser($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getUser() === $this) {
                $post->setUser(null);
            }
        }

        return $this;
    }
    public function __toString():String
    {
        return($this->email);
    }

    public function getFacebookPicture(): ?string
    {
        return $this->facebookPicture;
    }

    public function setFacebookPicture(?string $facebookPicture): static
    {
        $this->facebookPicture = $facebookPicture;

        return $this;
    }

    public function getFacebookExpirationTime(): ?string
    {
        return $this->facebookExpirationTime;
    }

    public function setFacebookExpirationTime(?string $facebookExpirationTime): static
    {
        $this->facebookExpirationTime = $facebookExpirationTime;

        return $this;
    }

    public function getTwitterPicture(): ?string
    {
        return $this->TwitterPicture;
    }

    public function setTwitterPicture(?string $TwitterPicture): static
    {
        $this->TwitterPicture = $TwitterPicture;

        return $this;
    }

    public function getTwitterExpirationTime(): ?string
    {
        return $this->TwitterExpirationTime;
    }

    public function setTwitterExpirationTime(?string $TwitterExpirationTime): static
    {
        $this->TwitterExpirationTime = $TwitterExpirationTime;

        return $this;
    }

    public function getLinkedinPicture(): ?string
    {
        return $this->LinkedinPicture;
    }

    public function setLinkedinPicture(?string $LinkedinPicture): static
    {
        $this->LinkedinPicture = $LinkedinPicture;

        return $this;
    }

    public function getLinkedinExpirationTime(): ?string
    {
        return $this->LinkedinExpirationTime;
    }

    public function setLinkedinExpirationTime(?string $LinkedinExpirationTime): static
    {
        $this->LinkedinExpirationTime = $LinkedinExpirationTime;

        return $this;
    }
}
