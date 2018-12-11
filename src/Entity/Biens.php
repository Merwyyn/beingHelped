<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Biens
 *
 * @ORM\Table(name="biens", indexes={@ORM\Index(name="article_id", columns={"article_id"})})
 * @ORM\Entity
 */
class Biens
{
    /**
     * @var int
     *
     * @ORM\Column(name="article_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="text", length=0, nullable=false)
     */
    private $photos;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=false)
     */
    private $count;

    public function getArticleId(): ?int
    {
        return $this->articleId;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(string $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }


}
