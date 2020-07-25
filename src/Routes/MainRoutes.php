<?php

namespace App\Routes;

use App\Http\Controller\HomeController;
use Slim\App;

trait MainRoutes
{
    public function buildMainRoutes(App $app): App
    {
        $app->get('/', HomeController::class);

        return $app;
    }
}
