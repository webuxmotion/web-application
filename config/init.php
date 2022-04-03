<?php

if (PHP_MAJOR_VERSION < 8) {
  die('PHP version >= 8 is required!');
}

require_once __DIR__ . '/constants.php';
require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

?>
