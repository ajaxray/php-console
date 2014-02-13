<?php
/**
 * Define all the common dependencies here and return as a Pimple container
 * @see https://github.com/fabpot/Pimple
 */

use Symfony\Component\Yaml\Yaml;
use RedBean_Facade as R;

$container = new Pimple();

$container['config'] = Yaml::parse(file_get_contents('config.yml'));

/**
 * Analog - PHP 5.3+ micro logging package
 *
 * @see https://github.com/jbroadway/analog
 * @param $c
 * @return \Analog\Logger
 */
$container['logger'] = function($c) {
    $logger = new Analog\Logger;

    $filename = APP_ROOT . '/logs/'. date('Y-m-d') . '.txt';
    $logger->handler(Analog\Handler\File::init($filename));

    return $logger;
};

/**
 * Using RedBeanPHP as database ORM
 * This is just a placeholder for setting up Database Connection
 * To use, add -
 *    use RedBean_Facade as R;
 * after namespace and use as R::<func-name>()
 *
 * NOTE : Connection will not be established until $container['db'] is accessed
 *
 * @see http://www.redbeanphp.com/
 */
$container['db'] = function($c) {
    $dbconf = $c['config']['database'];

    if(isset($dbconf['path'])) {
        R::setup('sqlite:'. APP_ROOT . $dbconf['path']);
    } else {
        R::setup("mysql:host={$dbconf['host']};dbname={$dbconf['dbname']}",
            $dbconf['user'],$dbconf['pass']);
    }
    R::freeze(false);
    return true;
};

return $container;
