<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $names = ['1', '2', '3'];
        $names2 = ['1', '2', '3'];
        $this->setMeta('Main page', '"Description...', 'Keywords...');
        $this->set(compact('names', 'names2'));
    }
}