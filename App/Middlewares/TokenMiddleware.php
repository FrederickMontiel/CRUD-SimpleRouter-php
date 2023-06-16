<?php
namespace App\Middlewares;

use App\Models\UsersModel;
use EasyProjects\SimpleRouter\Router;

class TokenMiddleware{
    public function __construct(
        private ?UsersModel $usersModel = new UsersModel()
    ){}

    public function strict(){
        //Now you can use the Router class and access to Request and Response with Router::$request And Router::$response like:
        if(!isset(Router::$request->headers->Authorization)){
            Router::$response->status(401)->send(array("message" => "You must be logged in to access this resource"));
        }else{
            //Here the code to validate token and get user data from token
            Router::$request->headers->Authorization = $this->usersModel->getUser(1);
        }
    }

    public function optional(){
        if(isset(Router::$request->headers->Authorization)){
            //Here the code to validate token and get user data from token
            Router::$request->headers->Authorization = $this->usersModel->getUser(1);
        }
    }
}