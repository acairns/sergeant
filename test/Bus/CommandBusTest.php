<?php

use Cairns\Sergeant\Bus\CommandBus;
use Cairns\Sergeant\Bus\DefaultCommandBus;
use Cairns\Sergeant\Bus\ClosureCommandBus;

class CommandBusTest extends PHPUnit_Framework_TestCase
{
    public function test_factory_defaults()
    {
        $bus = CommandBus::factory();
        $this->assertTrue($bus instanceof DefaultCommandBus);
    }

    public function test_factory_detects_custom_closure()
    {
        $bus = CommandBus::factory(function () {
            // find handler
        });

        $this->assertTrue($bus instanceof ClosureCommandBus);
    }
}
