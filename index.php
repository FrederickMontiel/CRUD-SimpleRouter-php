<?php
    //Include composer
    include_once __DIR__."/vendor/autoload.php";

    use EasyProjects\SimpleRouter\Router as Router;

    use App\Routes\AccountsRoute;

    $router = new Router();
    
    $router->cors(
        "*",
        "*",
        "*"
    );

    $router->autoload();

    new AccountsRoute($router);

