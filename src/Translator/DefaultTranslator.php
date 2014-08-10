<?php namespace Cairns\Sergeant\Translator;

use Cairns\Sergeant\Exception\TranslatorException;

class DefaultTranslator implements TranslatorInterface
{
    /**
     * Appends 'Handler' to command class name.
     * 
     * @param object $command
     */
    public function getHandler($command)
    {
        $handlerClass = get_class($command) . 'Handler';

        if (class_exists($handlerClass)) {
            return new $handlerClass;
        }

        throw new TranslatorException('Could not locate handler.');
    }
}
