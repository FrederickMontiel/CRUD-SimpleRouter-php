<?php
namespace App\Routes;

use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;
use EasyProjects\SimpleRouter\Router;

use App\Controllers\AccountsController;

class AccountsRoute{
    private AccountsController $accountsController;

    public function __construct(Router $router){
        $this->accountsController = new AccountsController();

        $router->get("/accounts", function(Request $req, Response $res){
            $this->accountsController->getAccounts($req, $res);
        });

        $router->post("/account", function(Request $req, Response $res){
            $this->accountsController->addAccount($req, $res);
        });

        $router->put("/account/{idAccount}", function(Request $req, Response $res){
            $this->accountsController->updateAccount($req, $res);
        });

        $router->delete("/account/{idAccount}", function(Request $req, Response $res){
            $this->accountsController->deleteAccount($req, $res);
        });
    }
}