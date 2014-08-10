<?php namespace Cairns\Sergeant\Translator;

use Cairns\Sergeant\Exception\TranslatorException;

class ClosureTranslator implements TranslatorInterface
{
    /**
     * Callback to resolve translator.
     *
     * @var Closure
     */
    private $closure;

    /**
     * Store closure to be used when resolving handler.
     *
     * @param callable $closure
     */
    public function __construct(callable $closure)
    {
        $this->closure = $closure;
    }

    /**
     * Using the closure, resolve the handler.
     *
     * @param object $command
     */
    public function getHandler($command)
    {
        $closure = $this->closure;
        $handler = $closure($command);

        if ($handler) {
            return $handler;
        }

        throw new TranslatorException('Could not locate handler.');
    }
}
