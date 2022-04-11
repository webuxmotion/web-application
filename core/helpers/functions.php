<?php

use core\App;

function debug($data, $die = false) {
  echo '<pre>' . print_r($data, 1) . '</pre>';

  if ($die) {
    die;
  }
}

function upperCamelCase($name) {
  $name = str_replace('-', ' ', $name);
  $name = ucwords($name);
  $name = str_replace(' ', '', $name);
  
  return $name;
}

function lowerCamelCase($name) {
  $name = upperCamelCase($name);
  $name = lcfirst($name);
  
  return $name;
}

function h($str) {
  return htmlspecialchars($str);
}

function redirect($http = false) {
  if ($http) {
    $redirect = $http;
  } else {
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
  }
  header("Location: $redirect");
  die;
}

function debugProps() {
  debug(App::$app->getProperties());
}

function baseUrl() {
  return PATH . '/' . (
    !App::$app->getProperty('language')['base']
    ? App::$app->getProperty('language')['code'] . '/'
    : ''
  );
}

?>