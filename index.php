<?php

//Loading configurations files
require "config.php";

// custom autoloader
spl_autoload_register(function($class){

    require LIBS . $class . ".php";
});

//Autoloader from composer
require __DIR__.'/vendor/autoload.php';

$app = new Bootstrap();
//Options
//$app->setControllerPath("/controllers");
//$app->setModelPath("/models");
$app->init();


