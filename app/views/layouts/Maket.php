<?php

use Micro\Web\Html\Html;

/** @var string $content */
/** @var \App\Components\View $this */

?>
<?= Html::doctype('html5') ?>
<html>
<head>
    <?= Html::charset('utf-8') ?>
    <?= Html::meta('language', 'ru') ?>
    <?= Html::favicon('/favicon.ico') ?>
    <?= Html::meta('viewport', 'width=device-width, initial-scale=1.0') ?>
    <?= Html::title($this->title) ?>
</head>
<body>
<div id="container">
    <div id="top">
        <span><?= $this->container->company ?></span> <?= $this->container->slogan ?>
    </div>
    <div id="content">
        <?= $content ?>
    </div>
    <div id="footer">
        &copy; <?= $this->container->company ?> <?= date('Y') ?>
    </div>
</div>
</body>
</html>
