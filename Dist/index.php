<?php

use \App\Controllers\Router;

session_start();
require('../vendor/autoload.php');
$router = new Router;
$router->routeReq();
