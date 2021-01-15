<?php

declare(strict_types=1);

namespace App\Service\Responder;

use Psr\Http\Message\ResponseInterface as Response;

interface IResponderService
{
    public function html(Response $response, string $content, int $status = 200): Response;

    public function json(Response $response, array $content, int $status = 200): Response;
}
