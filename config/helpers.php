<?php

declare(strict_types=1);

namespace Helpers;

/**
 * Easy way to manage $_ENV variables
 *
 * @param string $key
 * @param mixed $value Can be null to alter $_ENV item
 * @return void|mixed
 */
function env(string $key, $value = null)
{
    if (is_null($value)) {
        return $_ENV[$key];
    }

    $_ENV[$key] = $value;
}
