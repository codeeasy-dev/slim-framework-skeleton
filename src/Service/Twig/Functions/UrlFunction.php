<?php

declare(strict_types=1);

namespace App\Service\Twig\Functions;

use function Helpers\env;

class UrlFunction
{
    public const TYPE_ABSOLUTE = 'absolute';
    public const TYPE_RELATIVE = 'relative';

    public function url(string $url, string $type = self::TYPE_RELATIVE): string
    {
        return
            (
                $type === self::TYPE_ABSOLUTE ?
                    env('ROUTE_ABSOLUTE_PATH')
                    :
                    env('ROUTE_RELATIVE_PATH')
            )
            . $url
        ;
    }
}
