<?php namespace Cairns\Sergeant;

use Cairns\Sergeant\Locator\DefaultLocator;
use Cairns\Sergeant\Locator\ClosureLocator;

class CommandDirector
{
    private $locator;

    public function __construct($locator = null)
    {
        if ($locator instanceof \Closure) {
            $locator = new ClosureLocator($locator);
        }

        if (! $locator) {
            $locator = new DefaultLocator;
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
        $handler = $this->getLocator()->getHandler($command);
        $handler->handle($command);
    }
}
