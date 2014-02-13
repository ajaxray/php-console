#!/usr/bin/env php
<?php
// app.php
require 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use PHPConsole\Command\GreetCommand;

define('APP_ROOT', __DIR__);

/**
 * @var Pimple  Dependency Injection Container
 */
$dc = (include 'dependency.php');

$app = new Application('Looptivity Aggregation', '0.1');
$dc['app'] = $app;

$app->add(new GreetCommand($dc));
$app->run();
