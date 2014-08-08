<?php namespace Cairns\Sergeant\Translator;

class CommandTranslatorStrategy implements CommandTranslatorInterface
{
    private $strategy;

    public function __construct($resolver = null)
    {
        $this->strategy = new DefaultCommandTranslator;

        if ($resolver instanceof \Closure) {
            $this->strategy = new ClosureCommandTranslator($resolver);
        }

        if (is_array($resolver)) {
            $this->strategy = new ArrayCommandTranslator($resolver);
        }
    }

    public function getStrategy()
    {
        return $this->strategy;
    }

    public function getHandler($command)
    {
        return $this->getStrategy()->getHandler($command);
    }
}
