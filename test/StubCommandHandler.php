<?php namespace Cairns\Sergeant\Test;

use Cairns\Sergeant\HandlerInterface;

class StubCommandHandler implements HandlerInterface
{
    public function handle($command)
    {
        $command->get();
    }
}
