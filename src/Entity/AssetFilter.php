<?php


namespace App\Entity;

class AssetFilter {


    /**
     * @var int|null
     */
    private $nb_person;

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