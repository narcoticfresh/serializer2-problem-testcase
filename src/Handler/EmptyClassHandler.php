<?php


namespace TestCase\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\Exception\NotAcceptableException;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

class EmptyClassHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'TestCase\Entities\EmptyClass',
                'method' => 'serializeDateTimeToJson',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'TestCase\Entities\EmptyClass',
                'method' => 'deserializeDateTimeToJson',
            ],
        ];
    }

    public function serializeDateTimeToJson(JsonSerializationVisitor $visitor, $object, array $type, Context $context)
    {
        if (!$context->shouldSerializeNull()) {
            throw new NotAcceptableException();
        }

        return null;
    }

    public function deserializeDateTimeToJson(JsonDeserializationVisitor $visitor, $object, array $type, Context $context)
    {
        if (!$context->shouldSerializeNull()) {
            throw new NotAcceptableException();
        }

        return null;
    }
}
