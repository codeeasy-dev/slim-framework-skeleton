<?php

namespace App\Service\Hello;

class HelloService implements IHelloService
{
    public function getMessage(): string
    {
        return "Hello from service";
    }
}
