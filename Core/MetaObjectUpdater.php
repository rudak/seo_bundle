<?php
namespace Rudak\SeoBundle\Core;

use Exception;
use Rudak\SeoBundle\Entity\Meta;

class MetaObjectUpdater
{
    public static function update(Meta $meta, array $values)
    {
        $_classMethods = get_class_methods($meta);
        foreach ($values as $key => $value) {
            $method = self::getMethodName($key);
            if (in_array($method, $_classMethods)) {
                $meta->$method($value);
            } else {
                throw new Exception(sprintf('Méthode "%s" invalide dans "%s".', $method, get_class($meta)));
            }
        }
        return $meta;
    }

    /**
     * Renvoie le nom de la methode, définie en fonction du nom de l'argument.
     * @param $key
     * @return string
     */
    private static function getMethodName($key)
    {
        if (strpos($key, '_')) {
            $parts = explode('_', $key);
            $out   = '';
            foreach ($parts as $part) {
                $out .= ucfirst($part);
            }
            return 'set' . $out;
        } else {
            return 'set' . ucfirst($key);
        }
    }


}