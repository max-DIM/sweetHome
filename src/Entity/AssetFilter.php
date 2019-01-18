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