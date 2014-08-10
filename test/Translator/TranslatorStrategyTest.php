<?php

use Cairns\Sergeant\Translator\TranslatorStrategy;
use Cairns\Sergeant\Translator\DefaultTranslator;
use Cairns\Sergeant\Translator\ClosureTranslator;

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    public function test_factory_defaults()
    {
        $strategy = new TranslatorStrategy;
        $this->assertTrue($strategy->getTranslator() instanceof DefaultTranslator);
    }

    public function test_factory_detects_custom_closure()
    {
        $strategy = new TranslatorStrategy(function () {
            // psudo handler locator
        });

        $this->assertTrue($strategy->getTranslator() instanceof ClosureTranslator);
    }
}
