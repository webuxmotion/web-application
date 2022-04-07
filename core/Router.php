<?php

namespace core;

class Router {
  protected static array $routes = [];
  protected static array $route = [];

  public static function add($regexp, $route = []) {
    self::$routes[$regexp] = $route;
  }

  public static function getRoutes(): array {
    return self::$routes;
  }

  public static function getRoute(): array {
    return self::$route;
  }

  public static function dispatch($url) {
    $url = self::removeQueryString($url);

    if (self::matchRoute($url)) {
      $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
      $action = self::$route['action'] . 'Action';

      if (class_exists($controller)) {
        $controllerObject = new $controller(self::$route);
        if (method_exists($controllerObject, $action)) {
          $controllerObject->$action();
          $controllerObject->getModel();
          $controllerObject->getView();
        } else {
          throw new \Exception("Method {$controller}::{$action} not found", 404);
        }
      } else {
        throw new \Exception("Controller {$controller} not found", 404);
      }
    } else {
      throw new \Exception("Page not found", 404);
    }
  }

  public static function matchRoute($url): bool {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#{$pattern}#i", $url, $matches)) {
        
        foreach ($matches as $k => $v) {
          if (is_string($k)) {
            $route[$k] = $v;
          }
        }

        if (empty($route['action'])) {
          $route['action'] = 'index';
        }

        if (!isset($route['prefix'])) {
          $route['prefix'] = '';
        } else {
          $route['prefix'] .= '\\';
        }

        $route['controller'] = upperCamelCase($route['controller']);
        $route['action'] = lowerCamelCase($route['action']);

        self::$route = $route;
       
        return true;
      }
    }
    return false;
  }

  protected static function removeQueryString($url) {
    if ($url) {
      $params = explode('&', $url, 2);

      if (!str_contains($params[0], '=')) {
        return rtrim($params[0], '/');
      }
    }

    return '';
  }
}