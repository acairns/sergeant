<?php namespace Cairns\Sergeant\Translator;

use Cairns\Sergeant\Exception\CommandTranslatorException;

class ClosureCommandTranslator implements CommandTranslatorInterface
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

        throw new CommandTranslatorException('Could not locate handler.');
    }
}
