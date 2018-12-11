<?php

namespace App\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

define("BLOCKED_FLAG", 1);
define("ADMIN", 1);
/**
 * Membres
 *
 * @ORM\Table(name="membres")
 * @ORM\Entity(repositoryClass="App\Repository\MembresRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class Membres extends EntityRepository implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=false, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="forget_key", type="string", length=10, nullable=true)
     */
    private $forgetKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="register_key", type="string", length=10, nullable=true)
     */
    private $registerKey;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="smallint", nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="flag", type="smallint", nullable=false)
     */
    private $flag;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_flag", type="time", nullable=true)
     */
    private $dateFlag;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     */
    private $nom;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="prenom", type="string", length=40, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=false)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=70, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=40, nullable=false)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20, nullable=false)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="sexe", type="smallint", nullable=false)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="time", nullable=false)
     */
    private $dateNaissance;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * Membres constructor.
     */
    public function __construct()
    {

    }



    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.email = :email')
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function isBlocked(){
        return ($this->getFlag()==BLOCKED_FLAG && $this->getDateFlag()>=time());
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getForgetKey(): ?string
    {
        return $this->forgetKey;
    }

    public function setForgetKey(?string $forgetKey): self
    {
        $this->forgetKey = $forgetKey;

        return $this;
    }

    public function getRegisterKey(): ?string
    {
        return $this->registerKey;
    }

    public function setRegisterKey(?string $registerKey): self
    {
        $this->registerKey = $registerKey;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFlag(): ?int
    {
        return $this->flag;
    }

    public function setFlag(int $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getDateFlag(): ?\DateTimeInterface
    {
        return $this->dateFlag;
    }

    public function setDateFlag(?\DateTimeInterface $dateFlag): self
    {
        $this->dateFlag = $dateFlag;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->sexe;
    }

    public function setSexe(int $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }


    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getRoles()
    {
        $roles=['ROLE_USER'];
        if ($this->getType()==ADMIN){
            $roles[]='ROLE_ADMIN';
        }
        return $roles;
    }

    public function getUsername()
    {
        return $this->getEmail();
    }
}
