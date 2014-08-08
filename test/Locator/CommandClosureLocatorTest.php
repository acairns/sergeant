<?php

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;

use Cairns\Sergeant\Locator\CommandLocator;

class CommandClosureLocatorTest extends PHPUnit_Framework_TestCase
{
    public function test_locator_resolves_handler()
    {
        $command = new StubCommand;

        $locator = new CommandLocator(function ($command) {
            return new StubCommandHandler;
        });

        $handler = $locator->getHandler($command);
        
        $this->assertTrue($handler instanceof StubCommandHandler);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\LocatorException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_locator_throws_exception_when_handler_is_not_found()
    {
        $locator = new CommandLocator(function ($command) {
            return false;
        });
        
        $handler = $locator->getHandler(new stdClass);
    }
}
