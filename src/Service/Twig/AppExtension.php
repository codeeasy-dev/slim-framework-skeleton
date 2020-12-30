<?php

declare(strict_types=1);

namespace App\Service\Twig;

use App\Service\Twig\Functions\UrlFunction;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private array $functions = [
        'url' => UrlFunction::class,
    ];
    private array $filters = [];

    /**
     * Return an array of custom twig functions
     *
     * @return array<TwigFunction>
     */
    public function getFunctions(): array
    {
        $twigFunctions = [];

        foreach ($this->functions as $functionName => $class) {
            $twigFunctions[] = new TwigFunction($functionName, [new $class(), $functionName]);
        }

        return $twigFunctions;
    }

    /**
     * Return an array of custom twig filters
     *
     * @return array<TwigFilter>
     */
    public function getFilters(): array
    {
        $twigFilters = [];

        foreach ($this->filters as $filterName => $class) {
            $twigFilters[] = new TwigFilter($filterName, [new $class(), $filterName]);
        }

        return $twigFilters;
    }
}
