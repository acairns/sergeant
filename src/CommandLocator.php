<?php namespace Cairns\Sergeant;

class CommandLocator
{
    public function getHandler($command)
    {
        $handlerClass = $command . 'Handler';

        if (class_exists($handlerClass)) {
            return new $handlerClass;
        }

        throw new \RuntimeException('Could not locate handler.');
    }
}
