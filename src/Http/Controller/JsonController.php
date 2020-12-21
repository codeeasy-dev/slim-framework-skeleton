<?php

declare(strict_types=1);

namespace App\Http\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class JsonController
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = json_encode(
            ['message' => 'Hello World!!!'],
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        $response->getBody()->write($data);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
