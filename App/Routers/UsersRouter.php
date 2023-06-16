<?php
namespace App\Routers;

use App\Controllers\UsersController;
use App\Middlewares\TokenMiddleware;
use EasyProjects\SimpleRouter\Router;

class UsersRouter{
    public function __construct(
        ?Router $router,
        ?TokenMiddleware $tokenMiddleware = new TokenMiddleware(),
        ?UsersController $usersController = new UsersController(),
    ){

        //First param, the route
        $router->get('/users/page/{page}',
            //This is the first Middleware 
            fn () => $tokenMiddleware->strict(),
            //This is the controller
            fn () => $usersController->getUsers()
        );

        $router->get('/user/{idUser}',
            fn () => $tokenMiddleware->strict(),
            fn () => $usersController->getUser()
        );

        $router->post('/user',
            fn () => $tokenMiddleware->strict(),
            fn () => $usersController->addUser()
        );

        $router->put('/user/{idUser}',
            fn () => $tokenMiddleware->strict(),
            fn () => $usersController->updateUser()
        );

        $router->delete('/user/{idUser}',
            fn () => $tokenMiddleware->strict(),
            fn () => $usersController->deleteUser()
        );
    }
}