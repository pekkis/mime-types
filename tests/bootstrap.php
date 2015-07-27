<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('Pekkis\\MimeTypes\\Tests\\', __DIR__);

gc_enable();

error_reporting(E_ALL ^ E_USER_DEPRECATED);
