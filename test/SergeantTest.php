<?php

use Cairns\Sergeant\Sergeant;

class SergeantTest extends PHPUnit_Framework_TestCase
{
    public function test_sergeant_creates_default_translator()
    {
        $sergeant = new Sergeant;
        $translator = $sergeant->getStrategy()->getTranslator();
        
        $this->assertInstanceOf('Cairns\Sergeant\Translator\DefaultTranslator', $translator);
    }

    public function test_sergeant_locates_handler_using_map_array()
    {
        $command = $this->createMockCommand();
        
        $map = array(
            get_class($command) => 'Cairns\Sergeant\Test\StubCommandHandler'
        );

        $this->assertCommandHandled($command, $map);
    }

    public function test_sergeant_locates_handler_using_closure_returning_string()
    {
        $command = $this->createMockCommand();

        $closure = function () {
            return 'Cairns\Sergeant\Test\StubCommandHandler';
        };

        $this->assertCommandHandled($command, $closure);
    }

    public function test_sergeant_uses_handler_returned_from_closure()
    {
        $command = $this->createMockCommand();

        $closure = function ($command) {
            $handler = Mockery::mock('Cairns\Sergeant\Test\StubCommandHandler')->makePartial();
            $handler->shouldReceive('handle')->times(1)->passthru();
            
            return $handler;
        };

        $this->assertCommandHandled($command, $closure);
    }

    protected function tearDown()
    {
        Mockery::close();
    }

    private function createMockCommand()
    {
        return Mockery::mock('Cairns\Sergeant\Test\StubCommand');
    }

    private function assertCommandHandled($command, $config)
    {
        $command->shouldReceive('get')->times(1);

        $sergeant = new Sergeant($config);
        $sergeant->execute($command);
    }
}
