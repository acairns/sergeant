<?php namespace Cairns\Sergeant\Translator;

use Cairns\Sergeant\Exception\TranslatorException;

class ClosureTranslator implements TranslatorInterface
{
    private $closure;

    public function __construct($closure)
    {
        $this->closure = $closure;
    }

    public function getHandler($command)
    {
        $closure = $this->closure;
        $handler = $closure($command);

        if ($handler) {
            return $handler;
        }

        throw new TranslatorException('Could not locate handler.');
    }
}
