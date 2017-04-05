<?php

namespace Rudak\SeoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('rudak_seo');

        $rootNode
            ->children()
                ->scalarNode('title')->isRequired()->end()
                ->scalarNode('description')->isRequired()->end()
                ->scalarNode('author')->isRequired()->end()
                ->scalarNode('og_title')->end()
                ->scalarNode('og_description')->end()
                ->scalarNode('og_type')->end()
                ->scalarNode('og_image')->end()
                ->scalarNode('og_locale')->end()
                ->scalarNode('fb_app_id')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
