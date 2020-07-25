<?php

namespace Test\Unit\Service\Hello;

use App\Service\Hello\HelloService;
use PHPUnit\Framework\TestCase;

class HelloServiceTest extends TestCase
{
    public function testHelloServiceGetMessageReturn(): void
    {
        $helloService = new HelloService();
        $message = $helloService->getMessage();

        $expected = "Hello from service";

        $this->assertEquals($expected, $message);
    }
}
