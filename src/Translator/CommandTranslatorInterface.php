<?php namespace Cairns\Sergeant\Translator;

interface CommandTranslatorInterface
{
    public function getHandler($command);
}
