<?php

use Cairns\Sergeant\CommandDirector;
use Cairns\Sergeant\Locator\DefaultLocator;

class CommandDirectorTest extends PHPUnit_Framework_TestCase
{
    public function test_director_creates_default_locator()
    {
        $director = new CommandDirector;
        $this->assertTrue($director->getLocator() instanceof DefaultLocator);
    }
}
