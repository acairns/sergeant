<?php namespace Cairns\Sergeant\Locator;

use Cairns\Sergeant\Exception\LocatorException;

class DefaultLocator
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
