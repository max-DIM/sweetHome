<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-12
 * Time: 10:00
 */

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;


/**
 * @OGM\RelationshipEntity(type="CONSULT")
 */

class NodeConsulte
{

    /**
     * @OGM\GraphId()
     */
    private $id;
    /**
     * @OGM\StartNode(targetEntity="NodeVisitor")
     */
    protected $visitor;


    /**
     * @OGM\EndNode(targetEntity="NodeProperty")
     */
    protected $property;


    /**
     * @OGM\Property(type="int")
     */
    protected $nbfois;

    /**
     * NodeConsulte constructor.
     * @param $visitor
     * @param $property
     */
    public function __construct(NodeVisitor $visitor, NodeProperty $property)
    {
        $this->visitor = $visitor;
        $this->property = $property;
    }


}
