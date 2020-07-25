<?php

namespace App\Kernel;

use Slim\App;

trait Middleware
{
    /**
     * @var array<string> $middlewares
     */
    private array $middlewares = [
        \App\Http\Middleware\JsonBodyParserMiddleware::class,
    ];

    private function setGlobalMiddlewares(App $app): App
    {
        foreach ($this->middlewares as $middleware) {
            $app->add(new $middleware());
        }

        $app->addRoutingMiddleware();
        $app->addErrorMiddleware(
            getenv('DISPLAY_ERROR_DETAILS'),
            getenv('LOG_ERRORS'),
            getenv('LOG_ERRORS_DETAILS')
        );

        return $app;
    }
}
