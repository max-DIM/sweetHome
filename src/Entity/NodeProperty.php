<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-12
 * Time: 08:43
 */

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

/**
 * @OGM\Node(label="Property")
 */
class NodeProperty
{

    /**
     * @OGM\GraphId()
     */

    protected $id;


    /**
     * @OGM\Property(type="string")
     */

    protected $address;

    /**
     * @OGM\Property(type="string")
     */

    protected $propertyName;

    /**
     * @OGM\Relationship(type="CONSULT",relationshipEntity="NodeConsulte",direction="INCOMING",collection=true,mappedBy="property")
     */
    private $consultations;


    /**
     * NodeProperty constructor.
     * @param $propertyName
     */
    public function __construct($propertyName)
    {
        $this->propertyName = $propertyName;
        $this->consultations = new Collection();
    }

    /**
     * @param NodeConsulte $consult
     */
    public function addConsultation(NodeConsulte $consult){

        $this->consultations->add($consult);
    }



}
