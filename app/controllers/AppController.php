<?php

namespace app\controllers;

use core\Controller;
use core\App;
use app\models\AppModel;
use app\widgets\Language\Language;

class AppController extends Controller {
    public function __construct($route) {
        parent::__construct($route);
        new AppModel();

        App::$app->setProperty('languages', Language::getLanguages());
    }
}