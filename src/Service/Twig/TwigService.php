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
        $appExtension = new AppExtension();
        $options = [];

        if (filter_var(env('TWIG_CACHE'), FILTER_VALIDATE_BOOLEAN)) {
            $options[] = ['cache' => __DIR__ . '/../../../cache/twig'];
        }

        $environment = new Environment($loader, $options);

        foreach ($appExtension->getFunctions() as $function) {
            $environment->addFunction($function);
        }

        foreach ($appExtension->getFilters() as $filer) {
            $environment->addFilter($filer);
        }

        return $environment;
    }
}
