<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lexique
 *
 * @ORM\Table(name="lexique", indexes={@ORM\Index(name="IDX_3C6C6E823FD73900", columns={"pere_id"})})
 * @ORM\Entity
 */
class Lexique
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
     * @ORM\Column(name="mot", type="string", length=30, nullable=false)
     */
    private $mot;

    /**
     * @var \Lexique
     *
     * @ORM\ManyToOne(targetEntity="Lexique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pere_id", referencedColumnName="id")
     * })
     */
    private $pere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMot(): ?string
    {
        return $this->mot;
    }

    public function setMot(string $mot): self
    {
        $this->mot = $mot;

        return $this;
    }

    public function getPere(): ?self
    {
        return $this->pere;
    }

    public function setPere(?self $pere): self
    {
        $this->pere = $pere;

        return $this;
    }


}
