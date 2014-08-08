<?php

class CommandDirectorTest extends PHPUnit_Framework_TestCase
{
    public function test_director_creates_default_locator()
    {
        $director = new Cairns\Sergeant\CommandDirector;
        $this->assertTrue($director->getLocator() instanceof Cairns\Sergeant\CommandLocator);
    }
}
