<?php
namespace App\Bin;

use PDO;

class DatabaseBin{
    public static PDO|bool $conn = false;

    public function __construct(){
        if(self::$conn == false){
            self::$conn = new PDO("mysql:host=localhost;dbname=tutorialCRUD", "root", "");
            self::$conn->exec("SET CHARACTER SET utf8");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$conn->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        }
    }

    public function getConnection(){
        return self::$conn;
    }
}