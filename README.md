PHP Console
==================

PHP Console is a ready made setup for starting a PHP command line application with **Symfony Console Component**.

How to start?
----------------

1. Copy `config.yml.dist` as `config.yml`
2. Update vendors using [composer](https://getcomposer.org/doc/00-intro.md). **Your project is ready!**
3. Run `php app.php -list` to see available commands and `php app.php demo:greet` see it in action
4. Copy sample command file `Command/GreetCommand.php` and create your own power commands.

Awesome! It's quick n easy, right?

Some Quick Notes
-------------------

* To use database, set your database information in `config.yml`
* The defaut namespace for commands is PHPConsole\Command. To change *PHPConsole* to *yourCoolApp*, 
    * make change in Autoload section of composer.json
    * run `path/to/composer.phar dump-autoload`
    * Change in _use_ of `app.php` and _namespace_ of `Commands/*` files accordingly

Building Blocks
---------------------

* [Symfony Console Component](http://symfony.com/doc/current/components/console/introduction.html) - A component for building command-line application
* [Pimple](https://github.com/fabpot/Pimple) - A tiny Dependency Injection Container (by creator of Symfony2)
* [Symfony YAML Component](http://symfony.com/doc/current/components/yaml/introduction.html) - Handles configs in [YAML](http://en.wikipedia.org/wiki/YAML) files
* [Analog](https://github.com/jbroadway/analog) - Small but powerful log writer for PHP5.3+ 
* [RedBeanPHP](http://www.redbeanphp.com/) - A tiny Database ORM that works magically! 
