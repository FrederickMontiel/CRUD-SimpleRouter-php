<?php
namespace App\Configs;

class Database{
    public function Users($new = false){
        if(is_array($new)){
            return file_put_contents("./Fake/Users.json", json_encode($new, JSON_PRETTY_PRINT));
        }else{
            return json_decode(file_get_contents("./Fake/Users.json"), true);
        }
    }
}