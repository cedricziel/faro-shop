<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class E2eTest extends PantherTestCase
{
    public function testEe2()
    {
        $pantherClient = static::createPantherClient();
        $pantherClient->get("/");
    }
}
