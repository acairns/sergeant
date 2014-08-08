<?php

use Cairns\Sergeant\Sergeant;
use Cairns\Sergeant\Translator\DefaultTranslator;

class SergeantTest extends PHPUnit_Framework_TestCase
{
    public function test_sergeant_creates_default_translator()
    {
        $director = new Sergeant;
        $translator = $director->getTranslator()->getStrategy();
        
        $this->assertTrue($translator instanceof DefaultTranslator);
    }
}
