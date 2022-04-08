<?php

namespace app\controllers;

use core\Controller;
use RedBeanPHP\R;

class MainController extends Controller {

    public function indexAction() {
        //$names = R::findAll('names');
        $names = ['1', '2', '3'];
        $names2 = ['1', '2', '3'];
        $this->setMeta('Main page', '"Description...', 'Keywords...');
        $this->set(compact('names', 'names2'));
    }
}