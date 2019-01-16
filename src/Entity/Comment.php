<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Asset", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assetid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actor", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $actorid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getAssetid(): ?Asset
    {
        return $this->assetid;
    }

    public function setAssetid(?Asset $assetid): self
    {
        $this->assetid = $assetid;

        return $this;
    }

    public function getActorid(): ?Actor
    {
        return $this->actorid;
    }

    public function setActorid(?Actor $actorid): self
    {
        $this->actorid = $actorid;

        return $this;
    }
}
