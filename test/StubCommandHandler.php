<?php namespace Cairns\Sergeant\Test;

use Cairns\Sergeant\CommandHandlerInterface;

class StubCommandHandler implements CommandHandlerInterface
{
    public function handle($command)
    {
        $command->run();
    }
}
