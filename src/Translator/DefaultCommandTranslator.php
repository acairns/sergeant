<?php namespace Cairns\Sergeant\Translator;

use Cairns\Sergeant\Exception\CommandTranslatorException;

class DefaultCommandTranslator implements CommandTranslatorInterface
{
    public function getHandler($command)
    {
        $handlerClass = get_class($command) . 'Handler';

        if (class_exists($handlerClass)) {
            return new $handlerClass;
        }

        throw new CommandTranslatorException('Could not locate handler.');
    }
}
