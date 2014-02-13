#!/usr/bin/env php
<?php
// app.php
require 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use Assembla\Command\GreetCommand;

define('APP_ROOT', __DIR__);

/**
 * @var Pimple  Dependency Injection Container
 */
$dic = (include 'deps.php');

$app = new Application('Looptivity Aggregation', '0.1');
$dic['app'] = $app;

$app->add(new GreetCommand);
$app->run();
