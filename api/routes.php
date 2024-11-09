<?php
// require_once __DIR__ . '/src/Controllers/UserController.php';
// require_once __DIR__ . '/ProfileController.php';

use Core\Router;
use Core\Request;
use Controllers\UserController;
//use Controllers\IndexController;

$router = new Router();
$user = new UserController();

// $request = Request::createFromGlobal();

// $router->register('/', new IndexController());

// $router->register('/profile/{id}', new ProfileController(),'POST');
// $router->register('/profile/{id}', new ProfileController(),'GET');
// call_user_func([$obj, "mymethod"]);
$router->register('/users', [$user, 'readUsers'], 'GET');
// $router->register('/write', [$user, 'writeUser'],'POST');
// $router->register('/user/{id}', [$user, 'userFromId'],'POST');


return $router;