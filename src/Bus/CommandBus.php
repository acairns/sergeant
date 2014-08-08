<?php namespace Cairns\Sergeant\Bus;

use Cairns\Sergeant\Bus\DefaultCommandBus;
use Cairns\Sergeant\Bus\ClosureCommandBus;

class CommandBus
{
    public static function factory($resolver = null)
    {
        if ($resolver instanceof \Closure) {
            return new ClosureCommandBus($resolver);
        }

        return new DefaultCommandBus;
    }
}
