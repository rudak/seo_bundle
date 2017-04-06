<?php
namespace Rudak\SeoBundle\Core;

use Rudak\SeoBundle\Model\Meta;
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
     * Construit l'objet Meta a partir d'un tableau de config
     * @param array $values contenant les valeurs d'hydratation de Meta
     * @return object Meta
     */
    public static function buildMetaObject(array $values)
    {
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer([$normalizer]);
        $meta       = $serializer->denormalize($values, Meta::class);
        MetaObjectValidator::validate($meta);
        return $meta;
    }

    /**
     * Met a jour l'objet Meta et lance une validation
     * @param array $values
     */
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