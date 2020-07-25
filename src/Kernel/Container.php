<?php

namespace App\Kernel;

use DI\Container as DIContainer;

trait Container
{
    /**
     * @var array<string, string> $services
     */
    private array $services = [
        \App\Service\Hello\IHelloService::class => \App\Service\Hello\HelloService::class
    ];

    private function buildContainer(): DIContainer
    {
        $container = new DIContainer();

        foreach ($this->services as $abstraction => $implementation) {
            $container->set($abstraction, new $implementation());
        }

        return $container;
    }
}
