<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Translator\TranslatorStrategy;

class Sergeant
{
    /**
     * Strategy responsible for determining translator.
     *
     * @param TranslatorStrategy
     */
    private $strategy;

    /**
     * Creates command bus with optional configuration.
     *
     * @param mixed $config
     */
    public function __construct($config = null)
    {
        $this->strategy = new TranslatorStrategy($config);
    }

    /**
     * Returns the translator strategy.
     *
     * @return TranslatorStrategy
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Instruct handler to process the command.
     *
     * @param object $command
     * @return void
     */
    public function execute($command)
    {
        $translator = $this->strategy->getTranslator();
        $translated = $translator->getHandler($command);
        
        $handler = new $translated;
        $handler->handle($command);
    }
}
