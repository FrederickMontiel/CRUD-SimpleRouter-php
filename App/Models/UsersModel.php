<?php
namespace App\Models;

use App\Configs\Database;
use stdClass;

class UsersModel{
    public function __construct(
        private ?Database $database = new Database(),
    ){}

    public function getUsers(int $page): array|bool {
        try{
            $usuarios = $this->database->Users();

            $usuarios = array_slice($usuarios, ($page - 1) * 10, 10);

            return $usuarios;
        }catch(\Exception $e){
            return false;
        }
    }

    public function getUser(int $idUser): array|bool {
        try{
            $usuarios = $this->database->Users();

            foreach($usuarios as $usuario){
                if($usuario["id"] == $idUser){
                    return $usuario;
                }
            }

            return array();
        }catch(\Exception $e){
            return false;
        }
    }

    public function addUser(int $id, string $name, string $email, stdClass|array $social): bool{
        try{
            $users = $this->database->Users();

            foreach($users as $user){
                if($user["id"] == $id){
                    return false;

                    throw new \Exception("The id is already in use");
                }
            }

            $newUser = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "social" => $social
            );

            array_push($users, $newUser);

            return $this->database->Users($users);
        }catch(\Exception $e){
            return false;
        }
    }
        
    public function updateUser(int $id, string $name, string $email, stdClass|array $social): bool {
        try{
            $usuarios = $this->database->Users();

            for ($i=0; $i < count($usuarios); $i++) { 
                if($usuarios[$i]["id"] == $id){
                    $usuarios[$i]["name"] = $name;
                    $usuarios[$i]["email"] = $email;
                    $usuarios[$i]["social"] = $social;

                    return $this->database->Users($usuarios);
                }
            }
        }catch(\Exception $e){
            return false;
        }
    }

    public function deleteUser(int $id): bool{
        try{
            $usuarios = $this->database->Users();

            foreach($usuarios as $key => $usuario){
                if($usuario["id"] == $id){
                    unset($usuarios[$key]);

                    return $this->database->Users($usuarios);
                }
            }
        }catch(\Exception $e){
            return false;
        }
    }
}