<?php

namespace core;

use RedBeanPHP\R;

class View {
    public string $content = '';

    public function __construct(
        public $route,
        public $layout = '',
        public $view = '',
        public $meta = [],
    ) {
        if (false !== $this->layout) {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    public function render($data) {
        if (is_array($data)) {
            extract($data);
        }

        $prefix = str_replace('\\', '/', $this->route['prefix']);
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        
        if (is_file($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        } else {
            throw new \Exception("View {$view_file}", 500);
        }

        if (false !== $this->layout) {
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            
            if (is_file($layout_file)) {
                $content = $this->content;
                require_once $layout_file;
            } else {
                throw new \Exception("Layout {$layout_file}", 500);
            }
        }
    }

    public function getMeta() {
        $out = '<title>' . h($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= '<meta name="description" content="' . h($this->meta['description']) . '">' . PHP_EOL;
        $out .= '<meta name="keywords" content="' . h($this->meta['keywords']) . '">' . PHP_EOL;
        
        return $out;
    }

    public function getPart($file, $data = null) {
        if (is_array($data)) {
            extract($data);
        }
        
        $file = APP . "/views/parts/{$file}.php";

        if (is_file($file)) {
            require $file;
        } else {
            echo "File {$file} not found...";
        }
    }

    public function getDbLogs() {
        if (DEBUG) {
            $logs = R::getDatabaseAdapter()
                ->getDatabase()
                ->getLogger();

            debug($logs);
        }
    }
}