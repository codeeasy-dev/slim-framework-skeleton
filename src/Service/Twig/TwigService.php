<?php

namespace App\Service\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService implements ITwigService
{
    public function buildTwigObject(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../../resources/view');
        $options = [];

        if (getenv('TWIG_CACHE')) {
            array_push($options, ['cache' => __DIR__ . '/../../../cache/twig']);
        }

        return new Environment($loader, $options);
    }
}
