<?php

namespace App\Entity;

class AssetSearch {

    /**
     * @var int|null
     */
    private $nbPersonSearch;
    /**
     * @var int|null
     */
    private $accomodationTypeSearch;

    /**
     * @return int|null
     */
    public function getNbPersonSearch(): ?int
    {
        return $this->nbPersonSearch;
    }

    /**
     * @param int|null $nbPersonSearch
     * @return AssetSearch
     */
    public function setNbPersonSearch(int $nbPersonSearch): AssetSearch
    {
        $this->nbPersonSearch = $nbPersonSearch;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAccomodationTypeSearch(): ?int
    {
        return $this->accomodationTypeSearch;
    }

    /**
     * @param int|null $accomodationTypeSearch
     * @return AssetSearch
     */
    public function setAccomodationTypeSearch(int $accomodationTypeSearch): AssetSearch
    {
        $this->accomodationTypeSearch = $accomodationTypeSearch;
        return $this;
    }


}