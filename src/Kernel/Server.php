<?php

namespace App\Kernel;

use App\Routes\MainRoutes;
use DI\Container;
use Dotenv\Dotenv;
use Slim\App;
use Slim\Factory\AppFactory;

class Server
{
    public function __construct()
    {
        $provider = new Provider();
        $middleware = new Middleware();

        $mainRoutes = new MainRoutes();

        $this->configDotenv();

        $container = $provider->buildContainer();
        $this->setContainer($container);
        $app = $this->buildApp();
        $app = $middleware->setGlobalMiddlewares($app);

        $app = $mainRoutes->buildMainRoutes($app);

        $app->run();
    }

    private function buildApp(): App
    {
        $app = AppFactory::create();
        return $app;
    }

    private function setContainer(Container $container): void
    {
        AppFactory::setContainer($container);
    }

    private function configDotenv(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }
}
