<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $arrivalDate;

    /**
     * @ORM\Column(type="date")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $travellerNB;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Asset", inversedBy="reservationId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assetId;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Actor", inversedBy="reservations")
     */
    private $actorId;

    public function __construct()
    {
        $this->actorId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getTravellerNB(): ?int
    {
        return $this->travellerNB;
    }

    public function setTravellerNB(int $travellerNB): self
    {
        $this->travellerNB = $travellerNB;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAssetId(): ?Asset
    {
        return $this->assetId;
    }

    public function setAssetId(?Asset $assetId): self
    {
        $this->assetId = $assetId;

        return $this;
    }

    /**
     * @return Collection|Actor[]
     */
    public function getActorId(): Collection
    {
        return $this->actorId;
    }

    public function addActorId(Actor $actorId): self
    {
        if (!$this->actorId->contains($actorId)) {
            $this->actorId[] = $actorId;
        }

        return $this;
    }

    public function removeActorId(Actor $actorId): self
    {
        if ($this->actorId->contains($actorId)) {
            $this->actorId->removeElement($actorId);
        }

        return $this;
    }
}
