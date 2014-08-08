<?php namespace Cairns\Sergeant\Test\Stub;

use Cairns\Sergeant\CommandHandlerInterface;

class TestCommandHandler implements CommandHandlerInterface
{
    public function execute($command)
    {
        $command->run();
    }
}
