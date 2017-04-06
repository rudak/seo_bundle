<?php
namespace Rudak\SeoBundle\Core;

use Exception;
use Rudak\SeoBundle\Model\Meta;

class MetaObjectUpdater
{
    /**
     * Met a jour l'objet Meta en fonction des valeurs recues
     * @param Meta  $meta
     * @param array $values
     * @return Meta
     * @throws Exception
     */
    public static function update(Meta $meta, array $values)
    {
        $_classMethods = get_class_methods($meta);
        foreach ($values as $key => $value) {
            $method = self::getMethodName($key);
            if (!in_array($method, $_classMethods)) {
                throw new Exception(sprintf('Méthode "%s" invalide dans "%s".', $method, get_class($meta)));
            }
            $meta->$method($value);
        }
        return $meta;
    }

    /**
     * Renvoie le nom de la methode, définie en fonction du nom de l'argument.
     * par exemple construit le nom de methode 'setMyAppId' à partir de la chaine 'set_my_app_id'
     * @param $str
     * @return string
     */
    private static function getMethodName($str)
    {
        $prefix = 'set';
        if (false !== strpos($str, '_')) {
            $parts = explode('_', $str);
            $out   = '';
            foreach ($parts as $part) {
                $out .= ucfirst($part);
            }
            return $prefix . $out;
        } else {
            return $prefix . ucfirst($str);
        }
    }


}