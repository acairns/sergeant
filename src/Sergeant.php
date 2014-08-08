<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Translator\CommandTranslatorStrategy;
use Cairns\Sergeant\Translator\CommandTranslatorInterface;

class Sergeant
{
    private $translator;
    private $resolver;

    public function __construct($locator = null)
    {
        $this->translator = new CommandTranslatorStrategy($locator);
    }

    public function getTranslator()
    {
        return $this->translator;
    }

    public function setResolver(\Closure $resolver)
    {
        $this->resolver = $resolver;
    }

    public function getResolver()
    {
        return $this->resolver;
    }

    public function execute($command)
    {
        $handler = $this->resolve(
            $this->getTranslator()->getHandler($command)
        );
        
        $handler->handle($command);
    }

    protected function resolve($handler)
    {
        if (! $this->resolver) {
            return new $handler;
        }

        $resolver = $this->resolver;
        return $resolver($handler);
    }
}
