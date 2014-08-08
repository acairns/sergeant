<?php

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;

use Cairns\Sergeant\Bus\ArrayCommandBus;

class ArrayCommandBusTest extends PHPUnit_Framework_TestCase
{
    public function test_bus_resolves_handler()
    {
        $bus = new ArrayCommandBus([
            'Cairns\Sergeant\Test\StubCommand' => 'Cairns\Sergeant\Test\StubCommandHandler'
        ]);

        $handler = $bus->getHandler(new StubCommand);
        
        $this->assertTrue($handler instanceof StubCommandHandler);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\CommandBusException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_bus_throws_exception_when_handler_is_not_found()
    {
        $bus = new ArrayCommandBus([]);
        $handler = $bus->getHandler(new stdClass);
    }
}
