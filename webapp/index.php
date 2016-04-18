<?php

require __DIR__ . '/../app/_bootstrap.php';
require __DIR__ . '/../app/Application.php';

$app = new \App\Application('devel', true);

$app->run(new \Micro\Web\Request)->send();

$app->terminate();
