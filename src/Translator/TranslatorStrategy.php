<?php namespace Cairns\Sergeant\Translator;

class TranslatorStrategy implements TranslatorInterface
{
    private $strategy;

    public function __construct($resolver = null)
    {
        $this->strategy = new DefaultTranslator;

        if ($resolver instanceof \Closure) {
            $this->strategy = new ClosureTranslator($resolver);
        }

        if (is_array($resolver)) {
            $this->strategy = new ArrayTranslator($resolver);
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
