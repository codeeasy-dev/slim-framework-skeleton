<?php

namespace App\Service\Plates;

use League\Plates\Engine;

class PlatesService implements IPlatesService
{
    public function buildPlatesObject(): Engine
    {
        return new Engine(__DIR__ . '/../../../resources/view', 'phtml');
    }
}
