<?php

use Cairns\Sergeant\Translator\CommandTranslatorStrategy;
use Cairns\Sergeant\Translator\DefaultCommandTranslator;
use Cairns\Sergeant\Translator\ClosureCommandTranslator;

class CommandTranslatorTest extends PHPUnit_Framework_TestCase
{
    public function test_factory_defaults()
    {
        $strategy = new CommandTranslatorStrategy;
        $this->assertTrue($strategy->getStrategy() instanceof DefaultCommandTranslator);
    }

    public function test_factory_detects_custom_closure()
    {
        $strategy = new CommandTranslatorStrategy(function () {
            // psudo handler locator
        });

        $this->assertTrue($strategy->getStrategy() instanceof ClosureCommandTranslator);
    }
}
