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
            $_ENV['DISPLAY_ERROR_DETAILS'],
            $_ENV['LOG_ERRORS'],
            $_ENV['LOG_ERRORS_DETAILS']
        );

        return $app;
    }
}
