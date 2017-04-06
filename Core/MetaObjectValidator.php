<?php
namespace Rudak\SeoBundle\Core;

use Rudak\SeoBundle\Model\Meta;
use Symfony\Component\Config\Definition\Exception\Exception;

class MetaObjectValidator
{
    /**
     * Lance Le/les validateur/s pour chekcer les valeurs
     * @param Meta $meta
     */
    public static function validate(Meta $meta)
    {
        self::validateOgType($meta);
    }

    /**
     * Renvoie une excception si le type choisi ne correspond à rien
     * @param Meta $meta
     */
    private static function validateOgType(Meta $meta)
    {
        $type = $meta->getOgType();
        if (null === $type)
            return;
        $types = ['article', 'website', 'menu', 'blog', 'video.tv_show', 'video.other', 'video.movie', 'video.episode', 'restaurant.restaurant', 'restaurant.menu_section', 'restaurant.menu_item', 'restaurant.menu', 'profile', 'product.item', 'product.group', 'product', 'place', 'music.song', 'music.radio_station', 'music.playlist', 'music.album', 'game.achievement', 'fitness.course', 'business.business', 'books.genre', 'books.book', 'books.author', 'book'];
        if (!in_array($type, $types)) {
            throw new Exception(sprintf("Le og:type '%s' n'est pas valide.", $type));
        }
    }
}