<?php

namespace App\Http\Controller;

use App\Service\Twig\ITwigService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    private ITwigService $twig;

    public function __construct(ITwigService $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $body = $this->twig
            ->buildTwigObject()
            ->render(
                'home/index.twig',
                ['message' => 'Hello World!!!']
            );

        $response->getBody()->write($body);
        return $response
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
}
