<?php

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

?>