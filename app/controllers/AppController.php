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

        $langs = Language::getLanguages();
        $lang = Language::getLanguage($langs);

        \core\Language::load($lang['code'], $this->route);

        App::$app->setProperty('languages', $langs);
        App::$app->setProperty('language', $lang);

        $languageSwitcher = new Language();

        $this->set(compact('languageSwitcher'));
    }
}
