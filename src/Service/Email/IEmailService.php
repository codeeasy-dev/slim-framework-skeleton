<?php

namespace App\Service\Email;

interface IEmailService
{
    public const SENDER = 'SENDER';
    public const RECEIVERS = 'RECEIVERS';
    public const SUBJECT = 'SUBJECT';
    public const HTML_BODY = 'HTML_BODY';
    public const PLAIN_BODY = 'PLAIN_BODY';

    /**
     * Send an e-mail
     *
     * @param array<IEmailService:*, mixed> $data
     * @return boolean
     */
    public function sendEmail(array $data): bool;
}
