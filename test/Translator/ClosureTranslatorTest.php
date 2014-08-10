<?php

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;

use Cairns\Sergeant\Translator\ClosureTranslator;

class ClosureTranslatorTest extends PHPUnit_Framework_TestCase
{
    public function test_translator_resolves_handler()
    {
        $translator = new ClosureTranslator(function () {
            return new StubCommandHandler;
        });

        $handler = $translator->getHandler(new StubCommand);
        
        $this->assertTrue($handler instanceof StubCommandHandler);
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
        
        $handler = $translator->getHandler(new stdClass);
    }
}
