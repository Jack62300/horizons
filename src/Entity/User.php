<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *  fields={"email"},
 *  message="L'email que vous avez indiqué est déjà utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit contenir plus de 8 caracter")
     */
    private $password;
    
    /**
     * @Assert\EqualTo(propertyPath="password", message="Votre mot de passe ne correspond pas au mot de passe taper ci-dessus")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

      /**
     * @var json
     *
     * @ORM\Column(name="roles", type="json", nullable=true)
     */
    private $roles;


    private $tentativeWhitelist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Section", inversedBy="users")
     */
    private $sectionOwner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

   

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles); 
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getUsername();
    }
    public function eraseCredentials(){}
    public function getSalt(){}

    public function getSectionOwner(): ?Section
    {
        return $this->sectionOwner;
    }

    public function setSectionOwner(?Section $sectionOwner): self
    {
        $this->sectionOwner = $sectionOwner;

        return $this;
    }





   

    
}
