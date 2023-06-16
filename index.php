<?php
require_once __DIR__.'/vendor/autoload.php';

use App\Routers\UsersRouter;
use EasyProjects\SimpleRouter\Router;

$router = new Router();
$router->cors()->setAllowedOrigins("easyprojects.tech", "localhost");
$router->cors()->setAllowedMethods("GET", "POST", "PUT", "DELETE");
$router->cors()->setAllowedHeaders("Content-Type", "Authorization");
$router->autoload();

$router->prepareAssets("./App/Views/Assets");

new UsersRouter($router);

$router->start();



