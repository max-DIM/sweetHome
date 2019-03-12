<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-11
 * Time: 14:51
 */

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="visitor")
 */


class Nodevisitor
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
     * Nodevisitor constructor.
     * @param $name
     */
    public function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
    }




}
