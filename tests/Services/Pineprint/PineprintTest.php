<?php

namespace OpenEvents\LaravelClient\Tests\Services\Pineprint;

use OpenEvents\LaravelClient\Event;
use OpenEvents\LaravelClient\Services\Pineprint\Pineprint;
use PHPUnit\Framework\TestCase;

class PineprintTest extends TestCase
{
    public function testGetInteger()
    {
            $pineprint = new Pineprint(new Event('test'));
            $this->assertIsInt($pineprint->getInteger());
            echo $pineprint->getInteger();
    }
}
