<?php

declare(strict_types=1);

namespace App\Service\Responder;

use Psr\Http\Message\ResponseInterface as Response;

class ResponderService implements IResponderService
{
    public function html(Response $response, string $content, int $status = 200): Response
    {
        $response->withHeader('Content-Type', 'text/html')
            ->withStatus($status)
            ->getBody()
            ->write($content);

        return $response;
    }

    public function json(Response $response, array $content, int $status = 200): Response
    {
        $jsonContent = json_encode(
            $content,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        $response->withHeader('Content-Type', 'application/json')
            ->withStatus($status)
            ->getBody()
            ->write($jsonContent);

        return $response;
    }
}
