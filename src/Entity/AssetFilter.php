<?php


namespace App\Entity;

class AssetFilter {


    /**
     * @var int|null
     */
    private $nb_person;

    /**
     * @var int|null
     */
    private $size;

    /**
     * @var int|null
     */
    private $floor;

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int|null $size
     * @return AssetFilter
     */
    public function setSize(?int $size): AssetFilter
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFloor(): ?int
    {
        return $this->floor;
    }

    /**
     * @param int|null $floor
     * @return AssetFilter
     */
    public function setFloor(?int $floor): AssetFilter
    {
        $this->floor = $floor;
        return $this;
    }

    /**
     * @var int|null
     */
    private $accomodationTypeSearch;

    /**
     * @return int|null
     */
    public function getAccomodationTypeSearch(): ?int
    {
        return $this->accomodationTypeSearch;
    }

    /**
     * @param int|null $accomodationTypeSearch
     * @return AssetFilter
     */
    public function setAccomodationTypeSearch(?int $accomodationTypeSearch): AssetFilter
    {
        $this->accomodationTypeSearch = $accomodationTypeSearch;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbPerson(): ?int
    {
        return $this->nb_person;
    }

    /**
     * @param int|null $nb_person
     * @return AssetFilter
     */
    public function setNbPerson(int $nb_person): AssetFilter
    {
        $this->nb_person = $nb_person;
        return $this;
    }







}