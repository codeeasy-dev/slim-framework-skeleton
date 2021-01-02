<?php

declare(strict_types=1);

namespace App\Kernel;

use App\Routes\MainRoutes;
use Slim\Factory\AppFactory;

use function Helpers\env;

class Server
{
    public function __construct()
    {
        $middleware = new Middleware();
        $provider = new Provider();

        $mainRoutes = new MainRoutes();

        $container = $provider->buildContainer();
        AppFactory::setContainer($container);

        $app = AppFactory::create();
        /** @psalm-suppress PossiblyNullArgument */
        $app->setBasePath(env('ROUTE_RELATIVE_PATH'));
        $app = $middleware->setGlobalMiddlewares($app);
        $app = $mainRoutes->buildMainRoutes($app);

        $app->run();
    }
}
