<?php

use Cairns\Sergeant\Sergeant;
use Cairns\Sergeant\Translator\DefaultTranslator;

class SergeantTest extends PHPUnit_Framework_TestCase
{
    public function test_sergeant_creates_default_translator()
    {
        $sergeant = new Sergeant;
        $translator = $sergeant->getStrategy()->getTranslator();
        
        $this->assertTrue($translator instanceof DefaultTranslator);
    }

    public function test_sergeant_executes()
    {
        $command = Mockery::mock('Cairns\Sergeant\Test\StubCommand');
        $command->shouldReceive('get')->times(1);

        $sergeant = new Sergeant(array(
            get_class($command) => 'Cairns\Sergeant\Test\StubCommandHandler'
        ));

        $sergeant->execute($command);
    }

    public function test_sergeant_executes_closure()
    {
        $command = Mockery::mock('Cairns\Sergeant\Test\StubCommand');
        $command->shouldReceive('get')->times(1);

        $sergeant = new Sergeant(function () {
            return 'Cairns\Sergeant\Test\StubCommandHandler';
        });

        $sergeant->execute($command);
    }

    public function test_sergeant_executes_closure_which_returns_class()
    {
        $command = Mockery::mock('Cairns\Sergeant\Test\StubCommand');

        $sergeant = new Sergeant(function ($command) {
            $handler = Mockery::mock('Cairns\Sergeant\Test\StubCommandHandler')->makePartial();
            $handler->shouldReceive('handle')->times(1);
            
            return $handler;
        });

        $sergeant->execute($command);
    }

    protected function tearDown()
    {
        Mockery::close();
    }
}
