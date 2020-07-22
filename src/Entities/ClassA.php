<?php

namespace TestCase\Entities;

use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SkipWhenEmpty;

/** @AccessType("public_method") */
class ClassA {

    /**
     * @Type("array<TestCase\Entities\ClassASub>")
     * @SkipWhenEmpty
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
