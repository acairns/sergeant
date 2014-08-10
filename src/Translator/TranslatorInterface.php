<?php namespace Cairns\Sergeant\Translator;

interface TranslatorInterface
{
    /**
     * @param object $command
     * @return Cairns\Sergeant\HandlerInterface
     */
    public function getHandler($command);
}
