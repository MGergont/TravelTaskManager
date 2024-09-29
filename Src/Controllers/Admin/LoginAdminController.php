<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Models\Admin\LoginAdminModel;
use Src\Controllers\AbstractController;

class LoginAdminController extends AbstractController{

    public function loginView() : Void{

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $this->redirectGrant($_SESSION['userGrant']);
        }else{
            (new View())->renderAdmin("loginAdmin", $this->paramView, "admin");
        }
    }

    public function login():void{
        
        $loginAdminModel = new LoginAdminModel($this->configuration);

        $data = [
            'login' => trim($this->request->postParam('login')),
            'adminPwd' => trim($this->request->postParam('pwd'))
        ];
                
        if(empty($data['login']) || empty($data['adminPwd'])){
            flash("loginAdmin", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/admin");
        }

        if($this->IfMaxLength($data,  30)){
            flash("loginAdmin", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/admin");
        };

        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("loginAdmin", "Niepoprawne znaki w nazwie", "alert-login alert-login--error");           
            $this->redirect("/admin");
        }


        //TODO przenieść reguły walidacyjne do Abstracta
        $result = $loginAdminModel->findUserByLogin($data['login']);
        
        if ($result != false) {

            $hashedPassword = $result->pwd;

            if($this->IfStatus($result->user_status, "block")){
                flash("loginAdmin", "Konto zostało zablokowane", "alert-login alert-login--error");           
                $this->redirect("/admin");
            }

            if($this->LoginErrorValid($result->login_error, 3)){
                $loginAdminModel->updateStatusAccount($result->id_admin, "block");
                flash("loginAdmin", "Konto zostało zablokowane", "alert-login alert-login--error");           
                $this->redirect("/admin");
            }

            if (password_verify($data['adminPwd'], $hashedPassword)) {
                $loginAdminModel->updateLastLogin($result->id_admin);
                $loginAdminModel->updateLoginError($result->id_admin, 0);
                $this->createUserSession($result);
            } else {
                $loginAdminModel->updateLoginError($result->id_admin, $result->login_error + 1);
                flash("loginAdmin", "Niepoprawny login lub hasło", "alert-login alert-login--confirm");  
                $this->redirect("/admin");
            }
        } else {
            flash("loginAdmin", "Niepoprawny login lub hasło", "alert-login alert-login--confirm");  
            $this->redirect("/admin");
        }
        
    }

    private function redirectGrant(string $grant):void{
        switch ($grant) {
            case 'admin':
                $this->redirect("/admin-dashboard");
                break;
            default:
                $this->redirect("/access-denied");
                break;
        }
    }

    private function createUserSession($user):void{
        $_SESSION['status'] = "login";
        $_SESSION['userId'] = $user->id_admin;
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
        $this->redirect("/admin");
    }

    private function IfMaxLength(array $data, int $length) : Bool {
        foreach ($data as $leng) {
            if (strlen($leng) >= $length) {
                return true;
            }
        }
        return false;
    }

    private function IfSpecialAndPolishCharacters(string $data) : Bool {
        if(!preg_match("/^[a-zA-Z0-9.]*$/", $data)){
            return true;
        }else{
            return false;
        }
    }

    private function IfStatus(string $status, string $statusExpected) : Bool {
        if($status === $statusExpected){
            return true;
        }else{
            return false;
        }
    }

    private function LoginErrorValid(int $currentState, int $maxError) : Bool {
        if($currentState >= $maxError){
            return true;
        }else{
            return false;
        }
    }
}