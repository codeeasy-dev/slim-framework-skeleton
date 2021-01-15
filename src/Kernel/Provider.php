<?php

declare(strict_types=1);

namespace App\Kernel;

use DI\Container;
use App\Service\Twig\{ITwigService, TwigService};
use App\Service\Responder\{IResponderService, ResponderService};

class Provider
{
    /**
     * @var array<string,string> $services
     */
    private array $services = [
        ITwigService::class => TwigService::class,
        IResponderService::class => ResponderService::class,
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
