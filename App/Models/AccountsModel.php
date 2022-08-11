<?php
namespace App\Models;

use App\Bin\DatabaseBin;
use PDO;

class AccountsModel{
    private PDO $conn;

    public function __construct(){
        $database = new DatabaseBin();
        $this->conn = $database->getConnection();
    }
    
    public function getAccounts(){
        $sql = "SELECT * FROM Accounts";
        $query = $this->conn->prepare($sql);
        
        if($query->execute()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    public function addAccount($usernameAccount, $emailAccount, $passwordAccount, $siteAccount){
        $sql = "INSERT INTO Accounts (usernameAccount, emailAccount, passwordAccount, siteAccount) VALUES (:usernameAccount, :emailAccount, :passwordAccount, :siteAccount)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":usernameAccount", $usernameAccount);
        $query->bindParam(":emailAccount", $emailAccount);
        $query->bindParam(":passwordAccount", $passwordAccount);
        $query->bindParam(":siteAccount", $siteAccount);

        return $query->execute();
    }

    public function updateAccount($idAccount, $usernameAccount, $emailAccount, $passwordAccount, $siteAccount){
        $sql = "UPDATE Accounts SET usernameAccount = :usernameAccount, emailAccount = :emailAccount, passwordAccount = :passwordAccount, siteAccount = :siteAccount WHERE idAccount = :idAccount";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":idAccount", $idAccount);
        $query->bindParam(":usernameAccount", $usernameAccount);
        $query->bindParam(":emailAccount", $emailAccount);
        $query->bindParam(":passwordAccount", $passwordAccount);
        $query->bindParam(":siteAccount", $siteAccount);
        
        return $query->execute();
    }

    public function deleteAccount($idAccount){
        $sql = "DELETE FROM Accounts WHERE idAccount = :idAccount";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":idAccount", $idAccount);

        return $query->execute();
    }
}