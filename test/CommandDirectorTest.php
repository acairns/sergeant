<?php

use Cairns\Sergeant\CommandDirector;
use Cairns\Sergeant\Bus\DefaultCommandBus;

class CommandDirectorTest extends PHPUnit_Framework_TestCase
{
    public function test_director_creates_default_bus()
    {
        $director = new CommandDirector;
        $this->assertTrue($director->getCommandBus() instanceof DefaultCommandBus);
    }
}
