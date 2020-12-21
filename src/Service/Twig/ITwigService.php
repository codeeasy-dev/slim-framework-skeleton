<?php

declare(strict_types=1);

namespace App\Service\Twig;

use Twig\Environment;

interface ITwigService
{
    public function buildTwigObject(): Environment;
}
