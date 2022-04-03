<?php

namespace core;

class App {
  public static $app;

  public function __construct() {
    new ErrorHandler();
    $query = urldecode($_SERVER['QUERY_STRING']);
    $query = trim($query, '/');
   
    self::$app = Registry::getInstance();
    $this->getParams();
    Router::dispatch($query);
  }

  protected function getParams() {
    $params = require_once CONFIG . '/params.php';

    if (!empty($params)) {
      self::$app->setProperty('params', $params);
    }
  }
}

?>
