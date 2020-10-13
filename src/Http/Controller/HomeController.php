<?php

namespace App\Http\Controller;

use App\Service\Hello\IHelloService;
use App\Service\Plates\IPlatesService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    private IPlatesService $plates;

    public function __construct(IPlatesService $plates)
    {
        $this->plates = $plates;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $body = $this->plates
            ->buildPlatesObject()
            ->render(
                'home/index',
                ['message' => 'Hello World!!!']
            );

        $response->getBody()->write($body);
        return $response
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
}
