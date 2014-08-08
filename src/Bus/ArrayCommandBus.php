<?php namespace Cairns\Sergeant\Bus;

use Cairns\Sergeant\Bus\CommandBusInterface;
use Cairns\Sergeant\Exception\CommandBusException;

class ArrayCommandBus implements CommandBusInterface
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
            throw new CommandBusException('Could not locate handler.');
        }

        $handler = $this->map[$commandClass];

        if (! class_exists($handler)) {
            throw new CommandBusException('Could not locate handler.');
        }

        return new $handler;
    }
}
