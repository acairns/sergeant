<?php namespace Cairns\Sergeant\Translator;

interface TranslatorInterface
{
    public function getHandler($command);
}
