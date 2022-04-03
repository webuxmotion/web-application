<?php

require '../config/init.php';

new \core\App();

debug(\core\Router::getRoutes());

?>
