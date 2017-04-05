<?php
/**
 * Created by PhpStorm.
 * User: rudak
 * Date: 01/04/2017
 * Time: 14:57
 */

namespace Rudak\SeoBundle\Core;

use Rudak\SeoBundle\Entity\Meta;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MetaBuilder
{
    private $meta;

    /**
     * MetaBuilder constructor.
     * crée un object Meta avec les valeurs de config
     * @param $config
     */
    public function __construct($config)
    {
        $this->meta = self::buildMetaObject($config);
    }

    /**
     * @param array $values
     * @return object
     */
    public static function buildMetaObject(array $values)
    {
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer([$normalizer]);
        $meta       = $serializer->denormalize($values, Meta::class);
        MetaObjectValidator::validate($meta);
        return $meta;
    }

    public function updateMetaObject(array $values)
    {
        MetaObjectUpdater::update($this->meta, $values);
        MetaObjectValidator::validate($this->meta);
    }

    public function getMetaObject()
    {
        return $this->meta;
    }

}