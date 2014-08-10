<?php

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;

use Cairns\Sergeant\Translator\ArrayTranslator;

class ArrayTranslatorTest extends PHPUnit_Framework_TestCase
{
    public function test_bus_resolves_handler()
    {
        $translator = new ArrayTranslator(array(
            'Cairns\Sergeant\Test\StubCommand' => 'Cairns\Sergeant\Test\StubCommandHandler'
        ));

        $translator->getHandler(new StubCommand);
        
        $this->assertTrue($handler instanceof StubCommandHandler);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\TranslatorException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_bus_throws_exception_when_handler_is_not_mapped()
    {
        $translator = new ArrayTranslator(array());
        $translator->getHandler(new stdClass);
    }

    /**
     * @expectedException        Cairns\Sergeant\Exception\TranslatorException
     * @expectedExceptionMessage Could not locate handler.
     */
    public function test_bus_throws_exception_when_handler_does_not_exist()
    {
        $translator = new ArrayTranslator(array(
            'stdClass' => 'fooBarBazQux'
        ));
        $translator->getHandler(new stdClass);
    }
}
