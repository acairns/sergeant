# Sergeant

[![Build Status](https://img.shields.io/travis/acairns/sergeant/master.svg?style=flat)](https://travis-ci.org/acairns/sergeant)
[![Coverage Status](https://img.shields.io/coveralls/acairns/sergeant.svg?style=flat)](https://coveralls.io/r/acairns/sergeant)
[![Quality Score](https://img.shields.io/scrutinizer/g/acairns/sergeant.svg?style=flat)](https://scrutinizer-ci.com/g/acairns/sergeant/?branch=master)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)

This package intends to comply with [PSR-1], [PSR-2] and [PSR-4]. If you notice any violations with these guidelines, please submit an issue or a pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md

---

Sergeant allows business logic to be extracted into their own classes and executed using domain language specific to the application.


Why use Sergeant?

- Allows business code to be abstracted into separate classes.
- Runs commands named using language which describes it's intent.
- Highly configurable and framework-agnostic.
- Enforces a 1:1 relationship between Command and Handler.


## Requirements

The following versions of PHP are supported by this version.

- PHP 5.3
- PHP 5.4
- PHP 5.5
- PHP 5.6


## Install

The primary way to install Sergeant is via Composer:

``` json
{
    "require": {
        "cairns/sergeant": "~0.3"
    }
}
```


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

## Example Usage

The command should contain all information your CommandHandler requires to complete the task.

It can take any form your application requres, however convention dictates this object should be a simple Data Transfer Object.

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


## Traits

Sergeant does not provide any traits you can mix into your existing classes. This is due to the configurable and framework-agnostic nature of Sergeant.

However, creating a trait is a great way to easily provide Sergent to any class you may wish.

For example, in Laravel you may wish to resolve Sergent from the IoC:

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
        $this->execute(new ExampleCommand);
    }
}
```

Future versions of Sergeant may provide traits to help integrations with common frameworks however the package is committed to remaining framework-agnostic.


## Credits

- [Andrew Cairns](https://github.com/acairns)
- [All Contributors](https://github.com/acairns/sergeant/contributors)

## License

The MIT License (MIT). Please see LICENSE file for more information.
