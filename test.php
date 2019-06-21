<?php

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

$autoloader = require __DIR__.'/vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($autoloader, "loadClass"));

$serializer =
    JMS\Serializer\SerializerBuilder::create()
        ->setSerializationContextFactory(function () {
            return \JMS\Serializer\SerializationContext::create()
                ->setSerializeNull(false);
        })
        ->configureListeners(function(JMS\Serializer\EventDispatcher\EventDispatcher $dispatcher) {
            $dispatcher->addSubscriber(new \TestCase\EventSubscriber\ClassASubEventSubscriber());
        })
        ->configureHandlers(function(JMS\Serializer\Handler\HandlerRegistry $registry) {
            $registry->registerSubscribingHandler(new \TestCase\Handler\EmptyClassHandler());
        })
        ->setDebug(true)
        ->build();

// our array members
$members = [];

$member1 = new \TestCase\Entities\ClassASub();
$member1->setName('member1');
$members[] = $member1;

$member2 = new \TestCase\Entities\ClassASub();
$member2->setName('member2');
$members[] = $member2;

// main class
$mainClass = new \TestCase\Entities\ClassA();
$mainClass->setMembers($members);

echo $serializer->serialize($mainClass, 'json');

// this serializes to '{"members":[{"name":"member1"},{}]}' -> why is the empty object rendered?
// can we archieve an output '{"members":[{"name":"member1"}]}' ?

// our problem: if we have no Listener that changes the Type to EmptyClass -> we have an empty object {} in the output
// -> with the change to EmptyClass and our handler returning null, with update to serializer 2 we have a null in the output, which we don't want
