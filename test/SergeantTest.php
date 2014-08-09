<?php

use Cairns\Sergeant\Sergeant;
use Cairns\Sergeant\Translator\DefaultTranslator;

class SergeantTest extends PHPUnit_Framework_TestCase
{
    public function test_sergeant_creates_default_translator()
    {
        $sergeant = new Sergeant;
        $translator = $sergeant->getTranslator()->getStrategy();
        
        $this->assertTrue($translator instanceof DefaultTranslator);
    }

    public function test_sergeant_executes()
    {
        $command = Mockery::mock('Cairns\Sergeant\Test\StubCommand');
        $command->shouldReceive('run')->times(1);

        $sergeant = new Sergeant(array(
            get_class($command) => 'Cairns\Sergeant\Test\StubCommandHandler'
        ));

        $sergeant->execute($command);
    }

    protected function tearDown()
    {
        Mockery::close();
    }
}
