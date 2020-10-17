<?php

namespace App\Kernel;

use DI\Container;

class Provider
{
    /**
     * @var array<string,string> $services
     */
    private array $services = [
        \App\Service\Plates\IPlatesService::class => \App\Service\Plates\PlatesService::class,
        \App\Service\Twig\ITwigService::class => \App\Service\Twig\TwigService::class,
    ];

    public function buildContainer(): Container
    {
        $container = new Container();

        foreach ($this->services as $abstraction => $implementation) {
            $container->set($abstraction, new $implementation());
        }

        return $container;
    }
}
