<?php

namespace app\widgets\Language;

use core\App;
use RedBeanPHP\R;

class Language {
    protected $template;
    protected $languages;
    protected $currentLanguage;

    public function __construct() {
        $this->template = __DIR__ . 'template.php';
        $this->run();
    }

    protected function run() {
        
    }

    public static function getLanguages(): array {
        return R::getAssoc("
            SELECT code, title, base, id FROM language ORDER BY base DESC
        ");
    }

  public static function getLanguage($languages): array {
    $lang = App::$app->getProperty('lang');

    if ($lang && array_key_exists($lang, $languages)) {
      echo $lang;
      echo 'OK';
    } else {
      echo 'NO';
    }

    return [];
  }
}
