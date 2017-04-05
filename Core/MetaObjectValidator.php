<?php
namespace Rudak\SeoBundle\Core;

use Rudak\SeoBundle\Entity\Meta;
use Symfony\Component\Config\Definition\Exception\Exception;

class MetaObjectValidator
{
    public static function validate(Meta $meta)
    {
        self::validateOgType($meta);
    }

    private static function validateOgType(Meta $meta)
    {
        $type = $meta->getOgType();
        if (null === $type)
            return;
        $types = ['article', 'website', 'menu', 'blog'];
        if (!in_array($type, $types)) {
            throw new Exception(sprintf("Le og:type '%s' n'est pas valide.", $type));
        }
    }
}