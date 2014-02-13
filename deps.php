<?php
/**
 * Define all the common dependencies here and return as a Pimple container
 * @see https://github.com/fabpot/Pimple
 */

use Symfony\Component\Yaml\Yaml;

$container = new Pimple();

$container['config'] = Yaml::parse(file_get_contents('config.yml'));
$container['logger'] = function($c) {
    $logger = new Analog\Logger;

    $filename = APP_ROOT . '/logs/'. date('Y-m-d') . 'txt';
    $logger->handler(Analog\Handler\File::init($filename));

    return $logger;
};

return $container;
