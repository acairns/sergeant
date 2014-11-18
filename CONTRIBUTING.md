# Contributing

Anyone is welcome to contribute to this package and they will also be credited.

To contribute, send a Pull Request on [GitHub](https://github.com/acairns/sergeant).



## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to use [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer) which has been added as a development dependency for Sergeant. See below for instructions.

- **Write tests!** - Your pull request won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the README and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - I follow semver as much as possible.

- **Create feature branches** - Don't ask to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please squash them before submitting.



## PSR-2 Coding Standards

``` bash
$ ./vendor/bin/phpcs --standard=PSR2 ./src/
```

## Running Unit Tests

``` bash
$ ./vendor/bin/phpunit
```
