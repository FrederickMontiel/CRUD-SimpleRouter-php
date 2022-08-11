<?php
namespace App\Controllers;

use App\Models\AccountsModel;
use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;

class AccountsController{
    private AccountsModel $accountModel;

    public function __construct(){
        $this->accountModel = new AccountsModel();
    }

    public function getAccounts(Request $req, Response $res){
        $res->status(200)->send([
            "data" => $this->accountModel->getAccounts(),
            "message" => "The accounts were successfully retrieved."
        ]);
    }

    public function addAccount(Request $req, Response $res){
        if(
            $this->accountModel->addAccount(
                $req->body->usernameAccount, 
                $req->body->emailAccount, 
                $req->body->passwordAccount, 
                $req->body->siteAccount
            )
        ){
            $res->status(200)->send([
                "message" => "The account was successfully created."
            ]);
        }else{
            $res->status(500)->send([
                "message" => "An error occurred while creating the account."
            ]);
        }
        
    }

    public function updateAccount(Request $req, Response $res){
        if(
            $this->accountModel->updateAccount(
                $req->params->idAccount, 
                $req->body->usernameAccount, 
                $req->body->emailAccount, 
                $req->body->passwordAccount, 
                $req->body->siteAccount
            )
        ){
            $res->status(200)->send([
                "message" => "The account was successfully updated."
            ]);
        }else{
            $res->status(500)->send([
                "message" => "An error occurred while updating the account."
            ]);
        }
    }

    public function deleteAccount(Request $req, Response $res){
        if(
            $this->accountModel->deleteAccount(
                $req->params->idAccount
            )
        ){
            $res->status(200)->send([
                "message" => "The account was successfully deleted."
            ]);
        }else{
            $res->status(500)->send([
                "message" => "An error occurred while deleting the account."
            ]);
        }
    }
}