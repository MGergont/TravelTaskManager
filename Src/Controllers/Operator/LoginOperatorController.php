<?php

declare(strict_types=1);

namespace Src\Controllers\Operator;

use Src\Views\View;
use Src\Models\Operator\LoginOperatorModel;
use Src\Controllers\AbstractController;

class LoginOperatorController extends AbstractController{

    public function loginView() : Void{

        if(isset($_SESSION['status']) && $_SESSION['status'] = "login"){
            $this->redirectGrant($_SESSION['userGrant']);
        }else{
            (new View())->renderOperator("loginOperator", $this->paramView, "");
        }
    }

    public function login():void{
        
        $loginMod = new LoginOperatorModel($this->configuration);

        $data = [
            'email' => trim($this->request->postParam('email')),
            'userPwd' => trim($this->request->postParam('pwd'))
        ];
        

        if(empty($data['email']) || empty($data['userPwd'])){
            
            $this->redirect("/");
        }

        if ($loginMod->findUserByLogin($data['email'])) {
            $loggedInUser = $loginMod->login($data['email'], $data['userPwd']);
            if ($loggedInUser) {
                $loginMod->updateLastLogin($loggedInUser->id_tenant);
                $this->createUserSession($loggedInUser);
            } else {
                
                $this->redirect("/");
            }
            
        } else {
            
            $this->redirect("/");
        }
        
    }

    private function redirectGrant(string $grant):void{
        switch ($grant) {
            case 'admin':
                $this->redirect("/admin");
                break;
            case 'user':
                $this->redirect("/user");
                break;
            default:
                $this->redirect("/access-denied");
                break;
        }
    }

    private function createUserSession($user):void{
        $_SESSION['status'] = "login";
        $_SESSION['usersId'] = $user->id_tenant;
        $_SESSION['usersName'] = $user->name;
        $_SESSION['usersLastName'] = $user->last_name;
        $_SESSION['usersEmail'] = $user->email;
        $_SESSION['userGrant'] = $user->user_grant;
        $_SESSION['firstLogin'] = $user->last_login;
        $this->redirectGrant($_SESSION['userGrant']);
    }

    public function logout():void{
        unset($_SESSION['status']);
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersLastName']);
        unset($_SESSION['usersEmail']);
        unset( $_SESSION['userGrant']);
        session_unset();
        session_destroy();
        $this->redirect("/");
    }
}