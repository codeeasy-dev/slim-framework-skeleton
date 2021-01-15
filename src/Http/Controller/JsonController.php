<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Service\Responder\IResponderService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class JsonController
{
    private IResponderService $responder;

    public function __construct(IResponderService $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = ['message' => 'Hello World!!!'];

        return $this->responder->json($response, $data);
    }
}
