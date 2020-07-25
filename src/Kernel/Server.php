<?php

namespace App\Kernel;

use App\Routes\MainRoutes;
use DI\Container as DIContainer;
use Dotenv\Dotenv;
use Slim\App;
use Slim\Factory\AppFactory;

class Server
{
    use Middleware;
    use Container;
    use MainRoutes;

    public function __construct()
    {
        $this->configDotenv();

        $container = $this->buildContainer();
        $this->setContainer($container);
        $app = $this->buildApp();
        $app = $this->setGlobalMiddlewares($app);

        $app = $this->buildMainRoutes($app);

        $app->run();
    }

    private function buildApp(): App
    {
        $app = AppFactory::create();
        return $app;
    }

    private function setContainer(DIContainer $container): void
    {
        AppFactory::setContainer($container);
    }

    private function configDotenv(): void
    {
        Dotenv::createImmutable(__DIR__ . '/../../')
            ->load();
    }
}
