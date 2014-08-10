<?php namespace Cairns\Sergeant\Translator;

class TranslatorStrategy implements TranslatorInterface
{
    /**
     * The translator currently employed.
     * 
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Populate translator to use when translating.
     *
     * @param null|mixed $resolver
     */
    public function __construct($resolver = null)
    {
        $this->translator = $this->determineStrategy($resolver);
    }

    /**
     * Returns the current translator.
     *
     * @return TranslatorInterface
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Pass-through request for a handler to the Translator.
     *
     * @param object $command
     * @return Cairns\Sergeant\HandlerInterface
     */
    public function getHandler($command)
    {
        return $this->getTranslator()->getHandler($command);
    }

    /**
     * Strategy to determine which translator to be used.
     *
     * @param null|mixed $resolver
     */
    private function determineStrategy($resolver = null)
    {
        if ($resolver instanceof \Closure) {
            return new ClosureTranslator($resolver);
        }

        if (is_array($resolver)) {
            return new ArrayTranslator($resolver);
        }

        return new DefaultTranslator;
    }
}
