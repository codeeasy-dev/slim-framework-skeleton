<?php

namespace App\Routes;

use App\Http\Controller\HomeController;
use App\Http\Controller\JsonController;
use Slim\App;

class MainRoutes
{
    public function buildMainRoutes(App $app): App
    {
        $app->get('/', HomeController::class);
        $app->get('/json', JsonController::class);

        return $app;
    }
}
