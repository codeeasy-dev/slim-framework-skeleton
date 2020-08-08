<?php

namespace App\Service\Email;

use PHPMailer\PHPMailer\PHPMailer;

class EmailService implements IEmailService
{
    /**
     * @inheritDoc
     */
    public function sendEmail(array $data): bool
    {
        $mailer = new PHPMailer();

        if ((bool)$_ENV['EMAIL_IS_SMTP']) {
            $mailer->isSMTP();
        }

        if ((bool)$_ENV['EMAIL_AUTH']) {
            $mailer->SMTPAuth = true;
            $mailer->Username = $_ENV['EMAIL_USER'];
            $mailer->Password = $_ENV['EMAIL_PASS'];
        }

        $mailer->Host = $_ENV['EMAIL_HOST'];
        $mailer->SMTPSecure = $_ENV['EMAIL_SECURE'];
        $mailer->Port = (int)$_ENV['EMAIL_PORT'];

        $mailer->setFrom($data[IEmailService::SENDER]);
        foreach ($data[IEmailService::RECEIVERS] as $receiver) {
            $mailer->addAddress($receiver);
        }

        $mailer->isHTML(true);
        $mailer->Subject = $data[IEmailService::SUBJECT];
        $mailer->Body = $data[IEmailService::HTML_BODY];
        $mailer->AltBody = $data[IEmailService::PLAIN_BODY];

        return $mailer->send();
    }
}
