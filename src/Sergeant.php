<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Translator\TranslatorStrategy;
use Cairns\Sergeant\Translator\TranslatorInterface;

class Sergeant
{
    private $translator;

    public function __construct($locator = null)
    {
        $this->translator = new TranslatorStrategy($locator);
    }

    public function getTranslator()
    {
        return $this->translator;
    }

    public function execute($command)
    {
        $translated = $this->getTranslator()->getHandler($command);
        $handler = new $translated;
        
        $handler->handle($command);
    }
}
