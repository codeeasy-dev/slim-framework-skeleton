<?php

namespace App\Service\Twig;

use Twig\Environment;

interface ITwigService
{
    public function buildTwigObject(): Environment;
}
