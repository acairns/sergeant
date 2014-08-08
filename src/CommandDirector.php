<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Bus\CommandBus;
use Cairns\Sergeant\Bus\CommandBusInterface;

class CommandDirector
{
    private $bus;

    public function __construct($resolver = null)
    {
        $this->setCommandBus(
            CommandBus::factory($resolver)
        );
    }

    public function setCommandBus(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function getCommandBus()
    {
        return $this->bus;
    }

    public function execute($command)
    {
        $handler = $this->getCommandBus()->getHandler($command);
        $handler->handle($command);
    }
}
