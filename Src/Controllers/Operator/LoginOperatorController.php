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
            'login' => trim($this->request->postParam('login')),
            'userPwd' => trim($this->request->postParam('pwd'))
        ];
        

        if(empty($data['login']) || empty($data['userPwd'])){
            flash("loginOperator", "Nie uzupełniono odpowiednich formularzy", "alert alert--error");           
            $this->redirect("/");
        }

        if($this->IfMaxLength($data,  30)){
            flash("loginOperator", "Nieprawidłowa długość znaków", "alert alert--error");           
            $this->redirect("/");
        };

        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("loginOperator", "Niepoprawne znaki w nazwie", "alert alert--error");           
            $this->redirect("/");
        }

        $result = $loginMod->findUserByLogin($data['login']);

        if ($result != false) {

            $hashedPassword = $result->pwd;

            if($this->IfStatus($result->user_status, "block")){
                flash("loginOperator", "Konto zostało zablokowane", "alert alert--error");           
                $this->redirect("/");
            }

            if($this->LoginErrorValid((int)$result-> login_error, 3)){
                $loginMod->updateStatusAccount($result->id_operator, "block");
                flash("loginOperator", "Konto zostało zablokowane", "alert alert--error");           
                $this->redirect("/");
            }

            if (password_verify($data['userPwd'], $hashedPassword)) {
                $loginMod->updateLastLogin($result->id_operator);
                $loginMod->updateLoginError($result->id_operator, 0);
                $loginMod->updateStatusAccount($result->id_operator, "active");
                $this->createUserSession($result);
            } else {
                $loginMod->updateLoginError($result->id_operator, $result->login_error + 1);
                flash("loginOperator", "Niepoprawny login lub hasło", "alert alert--error");  
                $this->redirect("/");
            }
        } else {
            flash("loginOperator", "Niepoprawny login lub hasło tutaj", "alert alert--error");  
            $this->redirect("/");
        }
        
    }

    private function redirectGrant(string $grant):void{
        switch ($grant) {
            case 'manager':
                $this->redirect("/manager-dashboard");
                break;
            case 'user':
                $this->redirect("/user-dashboard");
                break;
            default:
                $this->redirect("/access-denied");
                break;
        }
    }

    private function createUserSession($user):void{
        $_SESSION['status'] = "login";
        $_SESSION['userId'] = $user->id_operator;
        $_SESSION['userLogin'] = $user->login;
        $_SESSION['userName'] = $user->name;
        $_SESSION['userLastName'] = $user->last_name;
        $_SESSION['userGrant'] = $user->user_grant;
        $_SESSION['firstLogin'] = $user->last_login;
        $_SESSION['userStatus'] = $user->user_status;
        $this->redirectGrant($_SESSION['userGrant']);
    }

    public function logout():void{
        unset($_SESSION['status']);
        unset($_SESSION['userId']);
        unset($_SESSION['userLogin']);
        unset($_SESSION['userName']);
        unset($_SESSION['userLastName']);
        unset( $_SESSION['userGrant']);
        unset($_SESSION['firstLogin']);
        unset($_SESSION['userStatus']);
        session_unset();
        session_destroy();
        $this->redirect("/");
    }
}