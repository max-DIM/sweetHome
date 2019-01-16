<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="binary")
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Asset", inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assetid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

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
}
