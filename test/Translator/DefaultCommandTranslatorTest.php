<?php

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;

use Cairns\Sergeant\Translator\DefaultCommandTranslator;

class DefaultCommandTranslatorTest extends PHPUnit_Framework_TestCase
{
    public function test_bus_resolves_handler()
    {
        $command = new StubCommand;

        $bus = new DefaultCommandTranslator;
        $handler = $bus->getHandler($command);
        
        $this->assertTrue($handler instanceof StubCommandHandler);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\CommandTranslatorException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_bus_throws_exception_when_handler_is_not_found()
    {
        $bus = new DefaultCommandTranslator;
        $handler = $bus->getHandler(new stdClass);
    }
}
