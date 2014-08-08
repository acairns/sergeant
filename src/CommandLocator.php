<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Exception\LocatorException;

class CommandLocator
{
    public function getHandler($command)
    {
        $handlerClass = get_class($command) . 'Handler';

        if (class_exists($handlerClass)) {
            return new $handlerClass;
        }

        throw new LocatorException('Could not locate handler.');
    }
}
