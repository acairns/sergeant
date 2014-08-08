# Sergeant

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
- Sensible defaulting for handler locating
- Create CommandArrayLocator to handle an array map passed to director
- Allow custom locator class to be passed to the director
- DocBlock all the things!
- CodeSniffer for the PSRing

- Consider DefaultHandlerLocator instead of Default Locator...
- Consider changing $director->execute() to $director->instruct()


## License

The MIT License (MIT). Please see LICENSE file for more information.
