<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller {
    public function indexAction() {
        debug($this->route);
        debug($this->model);
    }
}