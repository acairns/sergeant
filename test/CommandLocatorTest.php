<?php

use Cairns\Sergeant\Test\Stub\TestCommand;

class CommandLocatorTest extends PHPUnit_Framework_TestCase
{
    public function test_locator_resolves_handler()
    {
        $command = new TestCommand;

        $locator = new Cairns\Sergeant\CommandLocator;
        $handler = $locator->getHandler($command);
        
        $this->assertTrue($handler instanceof Cairns\Sergeant\Test\Stub\TestCommandHandler);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_locator_throws_exception_when_handler_is_not_found()
    {
        $locator = new Cairns\Sergeant\CommandLocator;
        $handler = $locator->getHandler(new stdClass);
    }
}
