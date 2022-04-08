<?php

namespace core;

abstract class Controller {
    public array $data = [];
    public array $meta = [];
    public false | string $layout = '';
    public false | string $view = '';
    public null | object $model = null;

    public function __construct(public $route = []) {
        
    }

    public function getModel() {
        $model = 'app\models\\' . $this->route['prefix'] . $this->route['controller'];
        
        if (class_exists($model)) {
            $this->model = new $model;
        }
    }

    public function getView() {
        $view = $this->view ?: $this->route['action'];

        $viewObject = new View($this->route, $this->layout, $view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data) {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '') {
        $this->meta = [
            'title' => $title, 'description' => $description, 'keywords' => $keywords
        ];
    }
}