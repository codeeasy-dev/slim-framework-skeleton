<?php

declare(strict_types=1);

namespace App\Kernel;

use Slim\App;

use function Helpers\env;

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
        $app->addRoutingMiddleware();
        $app->addErrorMiddleware(
            filter_var(env('DISPLAY_ERROR_DETAILS'), FILTER_VALIDATE_BOOLEAN),
            filter_var(env('LOG_ERRORS'), FILTER_VALIDATE_BOOLEAN),
            filter_var(env('LOG_ERRORS_DETAILS'), FILTER_VALIDATE_BOOLEAN),
        );

        foreach ($this->middlewares as $middleware) {
            $app->add(new $middleware());
        }

        return $app;
    }
}
