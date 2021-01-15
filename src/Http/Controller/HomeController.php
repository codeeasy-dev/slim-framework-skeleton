<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Service\Responder\IResponderService;
use App\Service\Twig\ITwigService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    private ITwigService $twig;
    private IResponderService $responder;

    public function __construct(ITwigService $twig, IResponderService $responder)
    {
        $this->twig = $twig;
        $this->responder = $responder;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $body = $this->twig
            ->buildTwigObject()
            ->render(
                'home/index.twig',
                ['message' => 'Hello World!!!']
            );

        return $this->responder->html($response, $body);
    }
}
