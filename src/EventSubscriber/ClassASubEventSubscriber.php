<?php

namespace TestCase\EventSubscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

class ClassASubEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_serialize',
                'method' => 'onPreSerialize',
                'class' => 'TestCase\\Entities\\ClassASub',
                'format' => 'json', // optional format
                'priority' => 0, // optional priority
            ),
        );
    }

    public function onPreSerialize(PreSerializeEvent $event)
    {
        // always change type so we end up in an empty array
        $event->setType('TestCase\\Entities\\EmptyClass');

        return $event;
    }
}
