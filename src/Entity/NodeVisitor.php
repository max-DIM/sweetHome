<?php

namespace App\Entity;


use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

/**
 * @OGM\Node(label="Visitor")
 */


class NodeVisitor
{

    /**
     * @OGM\GraphId()
     */

    protected $id;


    /**
     * @OGM\Property(type="string")
     */

    protected $name;


    /**
     * @OGM\Property(type="int")
     */

    protected $age;

    /**
     * @OGM\Relationship(type="CONSULT",relationshipEntity="NodeConsulte",direction="OUTGOING",collection=true,mappedBy="visitor")
     */
    private $consultations;


    /**
     * Nodevisitor constructor.
     * @param $name
     */
    public function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->consultations = new Collection();
    }

    /**
     * @param NodeConsulte $consult
     */
    public function addConsultation(NodeConsulte $consult){

        $this->consultations->add($consult);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }





}
