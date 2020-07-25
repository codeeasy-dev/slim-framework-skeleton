<?php

namespace App\Http\Controller;

use App\Service\Hello\IHelloService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    private IHelloService $hello;

    public function __construct(IHelloService $hello)
    {
        $this->hello = $hello;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = json_encode(
            ['message' => $this->hello->getMessage()],
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        $response->getBody()->write($data);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
