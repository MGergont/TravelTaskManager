<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\AddOperatorModel;

class AddOperatorController extends AbstractController{

    public function AddOperatorView() : Void{
        $this->adminDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){

            (new View())->renderAdmin("registerAdmin", $this->paramView, "admin");
        }else{
            $this->redirect("/access-denied");
        }
    }

    public function AddOperator() : Void{

        $AddOperatorModel = new AddOperatorModel($this->configuration);

        $data = [
            'login' => trim($this->request->postParam('login')),
            'name' => trim($this->request->postParam('name')),
            'lastName' => trim($this->request->postParam('lastName')),
            'phoneNumber' => trim($this->request->postParam('phoneNumber')),
            'email' => trim($this->request->postParam('email')),

            'houseNumber' => trim($this->request->postParam('houseNumber')),
            'street' => trim($this->request->postParam('street')),
            'town' => trim($this->request->postParam('town')),
            'zipCode' => trim($this->request->postParam('zipCode')),
            'city' => trim($this->request->postParam('city')),

            'privileges' => $this->request->postParam('privileges'),
            
            'pwd' => trim($this->request->postParam('pwd')),
            'repeatPwd' => trim($this->request->postParam('repeatPwd'))
        ];

        if($this->IfEmpty($data)){
            flash("addOperator", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/register");
        };

        if($this->IfMaxLength($data, 30)){
            flash("addOperator", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/register");
        };

        //TODO bez znaków specjalnych i polskich
        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("addOperator", "Niepoprawne znaki w nazwie", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("addOperator", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        if($this->IfSpecialCharacters($data['lastName'])){
            flash("addOperator", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO ralidacja numeru telefonu
        if($this->ValidPhoneNumber($data['phoneNumber'])){
            flash("addOperator", "Niepoprawny numer telefonu", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO walidacj adresu email
        if($this->ValidEmail($data['email'])){
            flash("addOperator", "Niepoprawny adres email", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("addOperator", "Niepoprawny numer mieszkania", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO Walidacja tylko przeciwko znaków specjalnych
        if($this->IfSpecialCharacters($data['street'])){
            flash("addOperator", "Niepoprawne znaki w nazwie ulicy", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("addOperator", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("addOperator", "Niepoprawny format kodu pocztowego", "alert-login alert-login--error");           
            $this->redirect("/register");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("addOperator", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/register");
        }

        if($this->ValidPrivileges($data['privileges'])){
            flash("addOperator", "Nieprawidłowe wartości w uprawnieniach", "alert-login alert-login--error");           
            $this->redirect("/register");
        }

        if($this->ValidPwd($data['pwd'], $data['repeatPwd'])){
            flash("addOperator", "Niepoprawne hasło", "alert-login alert-login--error");           
            $this->redirect("/register");
        }else{
            $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
            switch ($data['privileges']) {
                case 'admin':

                    if($AddOperatorModel->IfEmailExist($data['email'], "admin")) {
                        flash("addOperator", "Istnieje już użytkownik z takim adresem email", "alert-login alert-login--error");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->IfLoginExist($data['login'], "admin")) {
                        flash("addOperator", "Istnieje już użytkownik o takim loginie", "alert-login alert-login--error");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->AddAdmin($data)) {
                        flash("addOperator", "Udało się dodać Admina", "alert-login alert-login--confirm");
                        $this->redirect("/register");
                    }else {
                        flash("addOperator", "Coś poszło nie tak", "alert-login alert-login--error");
                        $this->redirect("/register");
                    }
                    break;
                case 'manager' and 'user':

                    if($AddOperatorModel->IfEmailExist($data['email'], "operator")) {
                        flash("addOperator", "Istnieje już użytkownik z takim adresem email", "alert-login alert-login--error");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->IfLoginExist($data['login'], "operator")) {
                        flash("addOperator", "Istnieje już użytkownik o takim loginie", "alert-login alert-login--error");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->AddOperator($data)) {
                        if($id = $AddOperatorModel->showIdNewUser()){
                            if($AddOperatorModel->AddAddress($data, $id['id_operator'])) {
                                flash("addOperator", "Udało się dodać Operatora", "alert-login alert-login--confirm");
                                $this->redirect("/register");
                            }else{
                                flash("addOperator", "Coś poszło nie tak", "alert-login alert-login--error");
                                $this->redirect("/register");
                            }
                        }else{
                            flash("addOperator", "Coś poszło nie tak", "alert-login alert-login--error");
                            $this->redirect("/register");
                        }
                    }else {
                        flash("addOperator", "Coś poszło nie tak", "alert-login alert-login--error");
                        $this->redirect("/register");
                    }
                    break;
                default:
                    flash("addOperator", "Nieprawidłowe wartości w uprawnieniach", "alert-login alert-login--error");           
                    $this->redirect("/register");
                    break;
            }
            

        }
    }
    

    private function IfEmpty(array $data) :Bool {
        if (empty($data['login']) ||
         empty($data['name']) ||
         empty($data['lastName']) ||
         empty($data['phoneNumber']) ||
         empty($data['email']) ||
         empty($data['houseNumber']) ||
         empty($data['street']) ||
         empty($data['town']) ||
         empty($data['zipCode']) ||
         empty($data['city']) ||
         empty($data['privileges']) ||
         empty($data['pwd']) ||
         empty($data['repeatPwd'])) {
            return true;
        }else{
            return false;
        }
    }
}