<?php

use core\App;

function __($key) {
  return \core\Language::get($key);
}

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

function get($key, $type = 'i') {
  $param = $key;
  $$param = $_GET[$param] ?? '';

  if ($type == 'i') {
    return (int)$$param;
  } elseif ($type == 'f') {
    return (float)$$param;
  } else {
    return trim($$param);
  }
}

function post($key, $type = 's') {
  $param = $key;
  $$param = $_POST[$param] ?? '';

  if ($type == 'i') {
    return (int)$$param;
  } elseif ($type == 'f') {
    return (float)$$param;
  } else {
    return trim($$param);
  }
}

?>