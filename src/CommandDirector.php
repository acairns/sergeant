<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Bus\CommandBus;
use Cairns\Sergeant\Bus\CommandBusInterface;

class CommandDirector
{
    private $bus;
    private $resolver;

    public function __construct($locator = null)
    {
        $this->setCommandBus(
            CommandBus::factory($locator)
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

    public function setResolver(\Closure $resolver)
    {
        $this->resolver = $resolver;
    }

    public function getResolver()
    {
        return $this->resolver;
    }

    public function execute($command)
    {
        $handler = $this->resolve(
            $this->getCommandBus()->getHandler($command)
        );
        
        $handler->handle($command);
    }

    protected function resolve($handler)
    {
        if (! $this->resolver) {
            return new $handler;
        }

        $resolver = $this->resolver;
        return $resolver($handler);
    }
}
