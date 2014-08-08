<?php namespace Cairns\Sergeant;

class CommandDirector
{
    private $locator;

    public function __construct($locator = null)
    {
        if (! $locator) {
            $locator = new CommandLocator;
        }

        $this->setLocator($locator);
    }

    public function setLocator($locator)
    {
        $this->locator = $locator;
    }

    public function getLocator()
    {
        return $this->locator;
    }

    public function execute($command)
    {
        $handler = $this->getLocator()->getHandler(get_class($command));
        $handler->execute($command);
    }
}
