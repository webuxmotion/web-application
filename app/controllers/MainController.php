<?php

namespace app\controllers;

use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction() {
        $slides = R::findAll('slider');
        $products = $this->model->getHits(1, 3);

        $this->set(compact('slides', 'products'));
        $this->setMeta('Головна сторінка', 'description...', 'keywords...');
    }
}