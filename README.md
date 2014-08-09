# Sergeant

[![Build Status](https://travis-ci.org/acairns/sergeant.svg?branch=master)](https://travis-ci.org/acairns/sergeant)
[![Coverage Status](https://img.shields.io/coveralls/acairns/sergeant.svg)](https://coveralls.io/r/acairns/sergeant)

Sergeant is a framework-agnostic command bus.

## How

Setup info here...


## No traits?

That's right, Sergeant does not provide any traits you can mix into
your existing classes. This is due to the framework-agnostic and
configurable nature of Sergeant.

However, traits can be easily leveraged to provide Sergent to any
class you may wish.

For example, in Laravel, you may wish to resolve Sergent from the IoC:

```php
trait Sergeant
{
    /**
     * Resolve Sergeant from the Ioc
     * and execute the command.
     */
    public function execute($command)
    {
        return App::make('sergeant')->execute($command);
    }
}
```

You can now use this within any class and provide access to your
configured Sergeant instance:


```php
class Example
{
    use Sergeant;

    public function foo()
    {
        $this->execute(new Bar);
    }
}
```

Sergeant may provide traits for common frameworks in later revisions.


## Todo

- Better code against interfaces
- Allow custom locator class to be passed to Sergeant
- CodeSniffer for the PSRing
- Integrations namespace with laravel service provider & trait.
- DocBlock all the things!

- Consider changing $sergeant->execute() to instruct(), or direct()?
- Consider resolving... what about the __construct()'s for handlers?
    -- Maybe we can assume all dependencies come from the command?
    -- Not sure how sensible this is... but it is a way to inject


## License

The MIT License (MIT). Please see LICENSE file for more information.
