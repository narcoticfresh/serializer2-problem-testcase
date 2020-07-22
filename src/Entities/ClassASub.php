<?php

namespace TestCase\Entities;

use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;

/** @AccessType("public_method") */
class ClassASub {

    /**
     * @Type("string")
     * @Exclude
     */
    private $name;

    /**
     * get Name
     *
     * @return mixed Name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * set Name
     *
     * @param mixed $name name
     *
     * @return void
     */
    public function setName($name) {
        $this->name = $name;
    }
}
