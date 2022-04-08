<?php

namespace core;

use RedBeanPHP\R;

class Db {
    use TSingleton;

    private function __construct() {
        $db = require_once CONFIG . '/db.php';
        debug($db['dsn']);
        debug($db['user']);
        debug($db['password']);
        R::setup($db['dsn'], $db['user'], $db['password']);
        debug(R::testConnection());
        // if (!R::testConnection()) {
        //     throw new \Exception('No connection to DB', 500);
        // }
        R::freeze(true);
        if (DEBUG) {
            R::debug(true, 3);
        }
    }
}