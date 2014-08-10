<?php namespace Cairns\Sergeant\Test;

use Cairns\Sergeant\Test\StubCommand;
use Cairns\Sergeant\Test\StubCommandHandler;
use Cairns\Sergeant\Translator\TranslatorInterface;

abstract class TranslatorTestCase extends \PHPUnit_Framework_TestCase
{
    public function assertGetsHandler(TranslatorInterface $translator, $message = '')
    {
        $handler = $translator->getHandler(new StubCommand);
        $this->assertThat($handler instanceof StubCommandHandler, self::isTrue(), $message);
    }
}
