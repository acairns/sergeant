<?php namespace Cairns\Sergeant\Locator;

use Cairns\Sergeant\Exception\LocatorException;

class CommandClosureLocator
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

        throw new LocatorException('Could not locate handler.');
    }
}
