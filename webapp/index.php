<?php

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('App\\', __DIR__ . '/../app', false); // path for composer

$app = new \Micro\Micro(__DIR__ . '/../app', __DIR__ . '/../micro', 'devel', false, false);

$app->run(new \Micro\web\Request())->send();

$app->terminate();
