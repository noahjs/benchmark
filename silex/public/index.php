<?php

define('FRAMEWORK_START', microtime(true));

$app = require_once __DIR__ . '/../app/bootstrap.php';
$app->run();
