<?php namespace Cairns\Sergeant\Bus;

interface CommandBusInterface
{
    public function getHandler($command);
}
