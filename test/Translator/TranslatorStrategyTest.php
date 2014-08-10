<?php

use Cairns\Sergeant\Test\TranslatorTestCase;
use Cairns\Sergeant\Translator\ArrayTranslator;
use Cairns\Sergeant\Translator\ClosureTranslator;
use Cairns\Sergeant\Translator\DefaultTranslator;
use Cairns\Sergeant\Translator\TranslatorStrategy;

class TranslatorStrategyTest extends TranslatorTestCase
{
    public function test_detects_default_strategy()
    {
        $strategy = new TranslatorStrategy;
        $this->assertTrue($strategy->getTranslator() instanceof DefaultTranslator);
    }

    public function test_detects_closure_strategy()
    {
        $strategy = new TranslatorStrategy(function () {
            // psudo handler locator
        });

        $this->assertTrue($strategy->getTranslator() instanceof ClosureTranslator);
    }

    public function test_detects_array_strategy()
    {
        $strategy = new TranslatorStrategy(array());
        $this->assertTrue($strategy->getTranslator() instanceof ArrayTranslator);
    }

    public function test_strategy_delegates_to_translator()
    {
        $strategy = new TranslatorStrategy;
        $this->assertGetsHandler($strategy);
    }
}
