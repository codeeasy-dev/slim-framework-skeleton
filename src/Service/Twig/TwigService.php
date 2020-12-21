<?php

declare(strict_types=1);

namespace App\Service\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use function Helpers\env;

class TwigService implements ITwigService
{
    public function buildTwigObject(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../../resources/view');
        $options = [];

        if (filter_var(env('TWIG_CACHE'), FILTER_VALIDATE_BOOLEAN)) {
            array_push($options, ['cache' => __DIR__ . '/../../../cache/twig']);
        }

        return new Environment($loader, $options);
    }
}
