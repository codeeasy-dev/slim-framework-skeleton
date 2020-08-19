<?php

namespace App\Kernel;

use Slim\App;

class Middleware
{
    /**
     * @var array<string> $middlewares
     */
    private array $middlewares = [
        \App\Http\Middleware\JsonBodyParserMiddleware::class,
    ];

    public function setGlobalMiddlewares(App $app): App
    {
        foreach ($this->middlewares as $middleware) {
            $app->add(new $middleware());
        }

        $app->addRoutingMiddleware();
        $app->addErrorMiddleware(
            (bool)env('DISPLAY_ERROR_DETAILS'),
            (bool)env('LOG_ERRORS'),
            (bool)env('LOG_ERRORS_DETAILS'),
        );

        return $app;
    }
}
