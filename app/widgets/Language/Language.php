<?php

namespace app\widgets\Language;

use core\App;
use RedBeanPHP\R;

class Language {
    protected $template;
    protected $languages;
    protected $currentLanguage;

    public function __construct() {
        $this->template = __DIR__ . '/template.php';
        $this->run();
    }

    public function __toString()
    {
        return $this->getHTML();
    }

    protected function run() {
        $this->languages = App::$app->getProperty('languages');
        $this->currentLanguage = App::$app->getProperty('language');
    }

    public static function getLanguages(): array {
        return R::getAssoc("
            SELECT code, title, base, id FROM language ORDER BY base DESC
        ");
    }

  public static function getLanguage($languages): array {
    $lang = App::$app->getProperty('lang');

    if ($lang && array_key_exists($lang, $languages)) {
      $key = $lang;
    } elseif (!$lang) {
      $key = key($languages);
    } else {
      $lang = h($lang);
      throw new \Exception("Not found language {$lang}", 404);
    }

    $lang_info = $languages[$key];
    $lang_info['code'] = $key;

    return $lang_info;
  }

  protected function getHTML(): string {
    ob_start();

    $code = $this->currentLanguage['code'];
    $langs = $this->languages;

    require $this->template;
    
    return ob_get_clean();
  }
}
