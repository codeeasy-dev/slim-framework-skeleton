<?php

declare(strict_types=1);

namespace App\Service\Twig;

use App\Service\Twig\Functions\UrlFunction;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /** @var array<string,string> FUNCTIONS */
    private const FUNCTIONS = [
        'url' => UrlFunction::class,
    ];
    /** @var array<string,string> FILTERS */
    private const FILTERS = [];

    /**
     * Return an array of custom twig functions
     *
     * @return array<TwigFunction>
     */
    public function getFunctions(): array
    {
        $twigFunctions = [];

        foreach (self::FUNCTIONS as $functionName => $class) {
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

        foreach (self::FILTERS as $filterName => $class) {
            $twigFilters[] = new TwigFilter($filterName, [new $class(), $filterName]);
        }

        return $twigFilters;
    }
}
