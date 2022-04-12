<?php

namespace app\controllers;

use RedBeanPHP\R;
use core\App;

class MainController extends AppController {

    public function indexAction() {
        $lang = App::$app->getProperty('language');

        $slides = R::findAll('slider');
        $products = $this->model->getHits($lang, 3);

        $this->set(compact('slides', 'products'));
        $this->setMeta('Головна сторінка', 'description...', 'keywords...');
    }
}