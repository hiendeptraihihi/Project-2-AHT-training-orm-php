<?php
require __DIR__. '/../vendor/autoload.php';

use Zino\Config\core;
use Zino\Route;
use Zino\Request;
use Zino\Dispatcher;


define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

// require(ROOT . 'Config/core.php');

// require(ROOT . 'router.php');
// require(ROOT . 'request.php');
// require(ROOT . 'dispatcher.php');

// $dispatch = new Dispatcher();
// $dispatch->dispatch();
$dispatch = new Dispatcher();
$dispatch->dispatch();

?>