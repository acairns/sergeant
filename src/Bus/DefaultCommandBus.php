<?php namespace Cairns\Sergeant\Bus;

use Cairns\Sergeant\Bus\CommandBusInterface;
use Cairns\Sergeant\Exception\CommandBusException;

class DefaultCommandBus implements CommandBusInterface
{
    public function getHandler($command)
    {
        $handlerClass = get_class($command) . 'Handler';

        if (class_exists($handlerClass)) {
            return new $handlerClass;
        }

        throw new CommandBusException('Could not locate handler.');
    }
}
