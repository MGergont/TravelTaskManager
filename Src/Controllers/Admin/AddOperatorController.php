<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\AddOperatorModel;

class AddOperatorController extends AbstractController{

    public function AddOperatorView() : Void{

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            //BUG $this->redirectGrant($_SESSION['userGrant']);
        }else{
            (new View())->renderAdmin("registerAdmin", $this->paramView, "admin");
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
            flash("addOperator", "Nie uzupełniono odpowiednich formularzy");           
            $this->redirect("/register");
        };

        if($this->IfMaxLength($data, 30)){
            flash("addOperator", "Nieprawidłowa długość znaków");           
            $this->redirect("/register");
        };

        //TODO bez znaków specjalnych i polskich
        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("addOperator", "Niepoprawne znaki w nazwie");           
            $this->redirect("/register");
        }
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("addOperator", "Niepoprawne znaki w danych wprowadzonych w formularzu");           
            $this->redirect("/register");
        }
        if($this->IfSpecialCharacters($data['lastName'])){
            flash("addOperator", "Niepoprawne znaki w danych wprowadzonych w formularzu");           
            $this->redirect("/register");
        }
        //TODO ralidacja numeru telefonu
        if($this->ValidPhoneNumber($data['phoneNumber'])){
            flash("addOperator", "Niepoprawny numer telefonu");           
            $this->redirect("/register");
        }
        //TODO walidacj adresu email
        if($this->ValidEmail($data['email'])){
            flash("addOperator", "Niepoprawny adres email");           
            $this->redirect("/register");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("addOperator", "Niepoprawny numer mieszkania ");           
            $this->redirect("/register");
        }
        //TODO Walidacja tylko przeciwko znaków specjalnych
        if($this->IfSpecialAndPolishCharacters($data['street'])){
            flash("addOperator", "Niepoprawne znaki w nazwie ulicy");           
            $this->redirect("/register");
        }
        if($this->IfSpecialAndPolishCharacters($data['town'])){
            flash("addOperator", "Niepoprawne znaki w nazwie miasta");           
            $this->redirect("/register");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("addOperator", "Niepoprawny format kodu pocztowego");           
            $this->redirect("/register");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialAndPolishCharacters($data['city'])){
            flash("addOperator", "Niepoprawne znaki w nazwie miasta");           
            $this->redirect("/register");
        }

        if($this->ValidPrivileges($data['privileges'])){
            flash("addOperator", "Nieprawidłowe wartości w uprawnieniach");           
            $this->redirect("/register");
        }

        if($this->ValidPwd($data['pwd'], $data['repeatPwd'])){
            flash("addOperator", "Niepoprawne hasło");           
            $this->redirect("/register");
        }else{
            $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
            switch ($data['privileges']) {
                case 'admin':

                    if($AddOperatorModel->IfEmailExist($data['email'], "admin")) {
                        flash("addOperator", "Istnieje już użytkownik z takim adresem email");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->IfLoginExist($data['login'], "admin")) {
                        flash("addOperator", "Istnieje już użytkownik o takim loginie");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->AddAdmin($data)) {
                        flash("addOperator", "Udało się dodać Admina");
                        $this->redirect("/register");
                    }else {
                        flash("addOperator", "Coś poszło nie tak");
                        $this->redirect("/register");
                    }
                    break;
                case 'manager' and 'user':

                    if($AddOperatorModel->IfEmailExist($data['email'], "operator")) {
                        flash("addOperator", "Istnieje już użytkownik z takim adresem email");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->IfLoginExist($data['login'], "operator")) {
                        flash("addOperator", "Istnieje już użytkownik o takim loginie");
                        $this->redirect("/register");
                    }

                    if($AddOperatorModel->AddOperator($data)) {
                        if($id = $AddOperatorModel->showIdNewUser()){
                            if($AddOperatorModel->AddAddress($data, $id['id_operator'])) {
                                flash("addOperator", "Udało się dodać Operatora");
                                $this->redirect("/register");
                            }else{
                                flash("addOperator", "Coś poszło nie tak");
                                $this->redirect("/register");
                            }
                        }else{
                            flash("addOperator", "Coś poszło nie tak");
                            $this->redirect("/register");
                        }
                    }else {
                        flash("addOperator", "Coś poszło nie tak");
                        $this->redirect("/register");
                    }
                    break;
                default:
                    flash("addOperator", "Nieprawidłowe wartości w uprawnieniach");           
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
    
    private function ValidPhoneNumber(string $data) : Bool {
        if(!strlen($data) == 9){
            return true;
        }else if(!preg_match('/^[0-9]{9,9}$/', $data)){
            return true;
        }
        return false;
    }

    private function IfSpecialCharacters(string $data) : Bool {
        if(!preg_match('/^[a-zA-ZĄĆĘŁŃÓŚŹŻąćęłńóśźż]+$/u', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    private function ValidEmail(string $data) : Bool {
        if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    
    private function ValidHouseNumber(string $houseNumber) : Bool {
        if (!preg_match('/^[0-9]+[a-zA-Z]?$/', $houseNumber)) {
            return true;  
        } else {
            return false;
        }
    }

    private function ValidZipCode(string $zipCode) : Bool {
        if (!preg_match('/^[0-9]{2}\-[0-9]{3}$/', $zipCode)) {
            return true;  
        } else {
            return false;
        }
    }

    private function ValidPrivileges(string $data) : Bool {
        switch ($data) {
            case 'admin':
                return false;
                break;
            case 'manager':
                return false;
                break;
            case 'user':
                return false;
                break;
            default:
                return true;
                break;
        }
    }

    private function ValidPwd(string $pwd, string $pwdRepeat) : Bool {
        if(strlen($pwd) < 6){
            return true;
        }else if($pwd !== $pwdRepeat){
            return true;
        }
        return false;
    }
}