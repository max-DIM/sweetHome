<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConditionRepository")
 */
class Condition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $payement;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $arrivalTime;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $departureTime;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSmokerFriendly;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasParking;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Asset", inversedBy="conditionAsset", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $asset;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayement(): ?string
    {
        return $this->payement;
    }

    public function setPayement(string $payement): self
    {
        $this->payement = $payement;

        return $this;
    }

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrivalTime;
    }

    public function setArrivalTime(?\DateTimeInterface $arrivalTime): self
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(?\DateTimeInterface $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getIsSmokerFriendly(): ?bool
    {
        return $this->isSmokerFriendly;
    }

    public function setIsSmokerFriendly(?bool $isSmokerFriendly): self
    {
        $this->isSmokerFriendly = $isSmokerFriendly;

        return $this;
    }

    public function getHasParking(): ?bool
    {
        return $this->hasParking;
    }

    public function setHasParking(?bool $hasParking): self
    {
        $this->hasParking = $hasParking;

        return $this;
    }

    public function getAsset(): ?Asset
    {
        return $this->asset;
    }

    public function setAsset(Asset $asset): self
    {
        $this->asset = $asset;

        return $this;
    }
}
