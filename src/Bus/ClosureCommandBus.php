<?php namespace Cairns\Sergeant\Bus;

use Cairns\Sergeant\Bus\CommandBusInterface;
use Cairns\Sergeant\Exception\CommandBusException;

class ClosureCommandBus implements CommandBusInterface
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

        throw new CommandBusException('Could not locate handler.');
    }
}
