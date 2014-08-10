<?php

use Cairns\Sergeant\Test\StubCommandHandler;
use Cairns\Sergeant\Test\TranslatorTestCase;
use Cairns\Sergeant\Translator\ClosureTranslator;

class ClosureTranslatorTest extends TranslatorTestCase
{
    public function test_translator_resolves_handler_from_closure()
    {
        $translator = new ClosureTranslator(function () {
            return new StubCommandHandler;
        });

        $this->assertGetsHandler($translator);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\TranslatorException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_translator_throws_exception_when_handler_is_not_found()
    {
        $translator = new ClosureTranslator(function () {
            return false;
        });
        
        $translator->getHandler(new stdClass);
    }
}
