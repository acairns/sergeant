# Sergeant

[![Build Status](https://img.shields.io/travis/acairns/sergeant/master.svg?style=flat)](https://travis-ci.org/acairns/sergeant)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)
[![Coverage Status](https://img.shields.io/coveralls/acairns/sergeant.svg?style=flat)](https://coveralls.io/r/acairns/sergeant)


Sergeant is a framework-agnostic command bus.


## Install

The primary way to install Sergeant is via Composer:

``` json
{
    "require": {
        "cairns/sergeant": "~0.2"
    }
}
```


## Requirements

The following versions of PHP are supported by this version.

* PHP 5.3
* PHP 5.4
* PHP 5.5
* PHP 5.6


## Getting Started

There are several options when configuring Sergeant, along with conventional defaulting.

``` php
$sergeant = new Cairns\Sergeant;
$sergeant->execute(new ExampleCommand); // Will search for ExampleCommandHandler
```

Several translators are provided to handle common configuration methods, such as arrays:

``` php
$sergeant = new Cairns\Sergeant(array(
    'ExampleCommand' => 'ExampleCommandHandler'
));
$sergeant->execute(new ExampleCommand); // Will map to ExampleCommandHandler
```

... or a closure:

``` php
$sergeant = new Cairns\Sergeant(function ($command) {
    return get_class($command) . 'Handler';
});
$sergeant->execute(new ExampleCommand); // Will assume ExampleCommandHandler
```

## Example

The command should contain all information your CommandHandler requires to complete the task.

It can take any form your application requres, however convention dictates this object should be a simple Data Transfer
Object.

``` php
class ExampleCommand
{
    private $message;

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage($message)
    {
        return $this->message;
    }
}
```


For Sergeant to be able to pass the Command to your CommandHandler, it must implement the `HandlerInterface`.

``` php
use Cairns\Sergeant\HandlerInterface;

class ExampleCommandHandler implements HandlerInterface
{
    public function handle($command)
    {
        var_dump($command->getMessage());
    }
}
```

You can now use Sergeant to handle the delegation of the command to your handler:

``` php
$command = new ExampleCommand;
$command->setMessage("Just Testing");

$sergeant = new Cairns\Sergeant;
$sergeant->execute($command); // string(12) "Just Testing"
```


## No traits?

That's right, Sergeant does not provide any traits you can mix into your existing classes. This is due to the
framework-agnostic and configurable nature of Sergeant.

However, a trait can be easily created to provide Sergent to any class you may wish.

For example, in Laravel, you may wish to resolve Sergent from the IoC:

```php
trait SergeantTrait
{
    /**
     * Resolve Sergeant from the IoC and execute the command.
     */
    public function execute($command)
    {
        return App::make('sergeant')->execute($command);
    }
}
```

You can now use this within any class and provide access to your configured Sergeant instance:

```php
class Example
{
    use SergeantTrait;

    public function foo()
    {
        $this->execute(new Bar);
    }
}
```

Future versions of Sergeant may provide traits to help integrations with common frameworks however the package is
committed to remaining framework-agnostic.


## Todo

- Add a proper dispatcher
- Allow custom locator class to be passed to Sergeant
- Add CodeSniffer as part of Travis build?
- Integration namespace, with laravel service provider & trait.
- DocBlock all the things!


## License

The MIT License (MIT). Please see LICENSE file for more information.
