<?php

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;
use Cairns\Sergeant\Test\TranslatorTestCase;
use Cairns\Sergeant\Translator\DefaultTranslator;

class DefaultTranslatorTest extends TranslatorTestCase
{
    public function test_translator_resolves_handler_from_class_name()
    {
        $translator = new DefaultTranslator;
        $this->assertGetsHandler($translator);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\TranslatorException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_translator_throws_exception_when_handler_is_not_found()
    {
        $translator = new DefaultTranslator;
        $translator->getHandler(new stdClass);
    }
}
