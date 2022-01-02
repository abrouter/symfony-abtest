<?php
declare(strict_types = 1);

namespace Abrouter\SymfonyClient\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('abrouter_client');

        $treeBuilder
            ->getRootNode()
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('token')
                    ->defaultValue('')
                ->end()
                ->scalarNode('host')
                    ->defaultValue('https://abrouter.com')
                ->end();

        return $treeBuilder;
    }


}
