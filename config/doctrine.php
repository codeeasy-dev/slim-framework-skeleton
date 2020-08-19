<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

function getEntityManager(): EntityManager
{
    $paths = [
        __DIR__ . '/../src/Entity',
    ];

    $isDevMode = (bool)env('DB_DEBUG');

    $dbParams = [
        'driver' => env('DB_DRIVER'),
        'host' => env('DB_HOST'),
        'user' => env('DB_USER'),
        'password' => env('DB_PASS'),
        'dbname' => env('DB_NAME'),
        'port' => (int)env('DB_PORT'),
    ];

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    $entityManager = EntityManager::create($dbParams, $config);

    return $entityManager;
}
