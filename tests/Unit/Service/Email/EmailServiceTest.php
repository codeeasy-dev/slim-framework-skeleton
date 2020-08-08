<?php

namespace Test\Unit\Service\Email;

use App\Service\Email\EmailService;
use App\Service\Email\IEmailService;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class EmailServiceTest extends TestCase
{
    public function testIsEmailServiceInstanceOfIEmailService(): void
    {
        $actual = new EmailService();
        $expected = IEmailService::class;

        $this->assertInstanceOf($expected, $actual);
    }

    public function testSendEmail(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../../');
        $dotenv->load();

        $email = new EmailService();

        $status = $email->sendEmail([
            IEmailService::SENDER => 'codeeasy@mail.com',
            IEmailService::RECEIVERS => ['johndoe@mail.com'],
            IEmailService::SUBJECT => 'Testing',
            IEmailService::HTML_BODY => <<<HTML
            <h1>Hello world</h1>
            HTML,
            IEmailService::PLAIN_BODY => 'Hello world',
        ]);

        $this->assertTrue($status);
    }
}
