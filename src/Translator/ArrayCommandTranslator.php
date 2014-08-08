<?php namespace Cairns\Sergeant\Translator;

use Cairns\Sergeant\Translator\CommandTranslatorInterface;
use Cairns\Sergeant\Exception\CommandTranslatorException;

class ArrayCommandTranslator implements CommandTranslatorInterface
{
    private $map;

    public function __construct($map)
    {
        $this->map = $map;
    }

    public function getHandler($command)
    {
        $commandClass = get_class($command);

        if (! array_key_exists($commandClass, $this->map)) {
            throw new CommandTranslatorException('Could not locate handler.');
        }

        $handler = $this->map[$commandClass];

        if (! class_exists($handler)) {
            throw new CommandTranslatorException('Could not locate handler.');
        }

        return new $handler;
    }
}
