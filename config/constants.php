<?php

function getSiteUrl() {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $domainName = $_SERVER['HTTP_HOST'];

  return $protocol.$domainName;
}

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/core');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("HELPERS", CORE . '/helpers');
define("LAYOUT", 'ishop');
define("NO_IMAGE", 'uploads/no_image.jpg');
define("PATH", getSiteUrl());
define("ADMIN", PATH . '/admin');

?>