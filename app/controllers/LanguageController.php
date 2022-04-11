<?php

namespace app\controllers;

use core\App;

class LanguageController extends AppController {

    public function changeAction() {
        $lang = $_GET['lang'] ?? null;
        $langs = App::$app->getProperty('languages');
        $currentLang = App::$app->getProperty('language');

        if ($lang) {
            if (array_key_exists($lang, $langs)) {
                $url = str_replace(PATH, '', $_SERVER['HTTP_REFERER']);
                $url = trim($url, '/');

                $url_parts = explode('/', $url, 2);
                if (array_key_exists($url_parts[0], $langs)) {
                    if ($langs[$lang]['base'] == 0) {
                        $url_parts[0] = $lang;
                    } else {
                        array_shift($url_parts);
                    }
                } else {
                    array_unshift($url_parts, $lang);
                }

                $newUrl = PATH . '/' . implode('/', $url_parts);

                redirect($newUrl);
            }
        }
        
        redirect();
    }
}