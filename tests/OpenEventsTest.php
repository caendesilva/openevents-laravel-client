<?php

namespace OpenEvents\LaravelClient\Tests;

use OpenEvents\LaravelClient\Event;
use OpenEvents\LaravelClient\OpenEvents;

/**
 * @covers \OpenEvents\LaravelClient\OpenEvents
 */
class OpenEventsTest extends  TestCase
{
    public function testCanConstruct()
    {
        $openEvents = new OpenEvents();
        $this->assertInstanceOf(OpenEvents::class, $openEvents);
    }

    public function testCanGetEnvironment()
    {
        $openEvents = new OpenEvents();
        $this->assertEquals('testing', $openEvents->environment());
    }

    public function testCanSetEnvironment()
    {
        $openEvents = new OpenEvents();
        $openEvents->setEnvironment('production');
        $this->assertEquals('production', $openEvents->environment());
    }

    public function testCanDispatchEvent()
    {
        $openEvents = new OpenEvents();
        $openEvents->dispatch(New Event('foo'));
        $this->assertEquals('{"event":"foo","data":null}', file_get_contents('event.json'));
        unlink('event.json');
    }
}
