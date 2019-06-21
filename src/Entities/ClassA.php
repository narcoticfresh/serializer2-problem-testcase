<?php

namespace TestCase\Entities;

use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\Type;

/** @AccessType("public_method") */
class ClassA {

    /**
     * @Type("array<TestCase\Entities\ClassASub>")
     */
    private $members = [];

    /**
     * get Members
     *
     * @return array Members
     */
    public function getMembers() {
        return $this->members;
    }

    /**
     * set Members
     *
     * @param array $members members
     *
     * @return void
     */
    public function setMembers($members) {
        $this->members = $members;
    }



}
