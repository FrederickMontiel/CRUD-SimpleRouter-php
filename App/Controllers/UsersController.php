<?php
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UsuariosModel;
use EasyProjects\SimpleRouter\Router;

class UsersController{
    public function __construct(
        private ?UsersModel $usuariosModel = new UsersModel(),
    ){}
    
    public function getUsers(){
        $users = $this->usuariosModel->getUsers(Router::$request->params->page);
        
        if($users){
            Router::$response->status(200)->send([
                "data" => $this->usuariosModel->getUsers(Router::$request->params->page),
                "message" => "Has been listed the users"
            ]);
        }else if(is_array($users) && count($users) == 0){
            Router::$response->status(404)->send([
                "message" => "The users not found"
            ]);
        }else{
            Router::$response->status(500)->send([
                "message" => "An error has ocurred"
            ]);
        }
    }

    public function getUser(){
        $user = $this->usuariosModel->getUser(Router::$request->params->idUser);

        if($user){
            Router::$response->status(200)->send([
                "data" => $user,
                "message" => "Has been listed the users"
            ]);
        }else if(is_array($user) && count($user) == 0){
            Router::$response->status(404)->send([
                "message" => "The user not found"
            ]);
        }else{
            Router::$response->status(500)->send([
                "message" => "An error has ocurred"
            ]);
        }
    }

    public function addUser(){
        if($this->usuariosModel->addUser(
            Router::$request->body->id,
            Router::$request->body->name,
            Router::$request->body->email,
            Router::$request->body->social
        )){
            Router::$response->status(201)->send([
                "message" => "The user has been created"
            ]);
        }else{
            Router::$response->status(500)->send([
                "message" => "An error has ocurred"
            ]);
        }
    }

    public function updateUser(){
        if($this->usuariosModel->updateUser(
            Router::$request->params->idUser,
            Router::$request->body->name,
            Router::$request->body->email,
            Router::$request->body->social
        )){
            Router::$response->status(200)->send([
                "message" => "The user has been updated"
            ]);
        }else{
            Router::$response->status(500)->send([
                "message" => "An error has ocurred"
            ]);
        }
    }

    public function deleteUser(){
        if($this->usuariosModel->deleteUser(Router::$request->params->idUser)){
            Router::$response->status(200)->send([
                "message" => "The user has been deleted"
            ]);
        }else{
            Router::$response->status(500)->send([
                "message" => "An error has ocurred"
            ]);
        }
    }
}