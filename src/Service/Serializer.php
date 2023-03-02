<?php


namespace App\Service;


use \JMS\Serializer\SerializerInterface;
use \JMS\Serializer\SerializerBuilder;
use \JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use JMS\Serializer\Expression\ExpressionEvaluator;


class Serializer
{
    public $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()
            ->setExpressionEvaluator(new ExpressionEvaluator(new ExpressionLanguage()))
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
    }

    public function getSerializer()
    {
        return $this->serializer;
    }
}
