<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set("display_errors", 1);

use Core\Router;
use Core\Request;
use Core\RouteNotFoundException;

require 'functions.php';



$router = require_once 'routes.php';

$request = Request::createFromGlobal();

try{
    echo $router->handle($request);
}catch (RouteNotFoundException $exception){
    echo $exception->getMessage();
}


