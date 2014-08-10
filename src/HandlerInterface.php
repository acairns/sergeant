<?php namespace Cairns\Sergeant;

interface HandlerInterface
{
    /**
     * @param mixed $command
     * @return void
     */
    public function handle($command);
}
