<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", indexes={@ORM\Index(name="IDX_4DA239A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_4DA2397294869C", columns={"article_id"})})
 * @ORM\Entity
 */
class Reservations
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
     * @var \DateTime
     *
     * @ORM\Column(name="for_when", type="time", nullable=false)
     */
    private $forWhen;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="time", nullable=false)
     */
    private $date;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * })
     */
    private $article;

    /**
     * @var \Membres
     *
     * @ORM\ManyToOne(targetEntity="Membres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForWhen(): ?\DateTimeInterface
    {
        return $this->forWhen;
    }

    public function setForWhen(\DateTimeInterface $forWhen): self
    {
        $this->forWhen = $forWhen;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getArticle(): ?Articles
    {
        return $this->article;
    }

    public function setArticle(?Articles $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getUser(): ?Membres
    {
        return $this->user;
    }

    public function setUser(?Membres $user): self
    {
        $this->user = $user;

        return $this;
    }


}
