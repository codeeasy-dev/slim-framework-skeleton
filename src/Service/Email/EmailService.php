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

        if ((bool)env('EMAIL_IS_SMTP')) {
            $mailer->isSMTP();
        }

        if ((bool)env('EMAIL_AUTH')) {
            $mailer->SMTPAuth = true;
            $mailer->Username = env('EMAIL_USER');
            $mailer->Password = env('EMAIL_PASS');
        }

        $mailer->Host = env('EMAIL_HOST');
        $mailer->SMTPSecure = env('EMAIL_SECURE');
        $mailer->Port = (int)env('EMAIL_PORT');

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
