<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_7332E1697294869C", columns={"article_id"})})
 * @ORM\Entity
 */
class Services
{
    /**
     * @var array
     *
     * @ORM\Column(name="available_times", type="array", length=0, nullable=false)
     */
    private $availableTimes;

    /**
     * @var \Articles
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * })
     */
    private $article;

    public function getAvailableTimes(): ?array
    {
        return $this->availableTimes;
    }

    public function setAvailableTimes(array $availableTimes): self
    {
        $this->availableTimes = $availableTimes;

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


}
