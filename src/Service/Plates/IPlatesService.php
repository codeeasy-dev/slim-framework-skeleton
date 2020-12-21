<?php

declare(strict_types=1);

namespace App\Service\Plates;

use League\Plates\Engine;

interface IPlatesService
{
    public function buildPlatesObject(): Engine;
}
