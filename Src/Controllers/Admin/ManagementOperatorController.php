<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\ManagementOperatorModel;

class ManagementOperatorController extends AbstractController
{
    public function ManagementOperatorView(): Void
    {
        $this->adminDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $dashboardAdminModel = new ManagementOperatorModel($this->configuration);

            $arrayUsers = $dashboardAdminModel->showOperators();

            $this->paramView['operators'] = $this->foramtDaty($arrayUsers);

            (new View())->renderAdmin("managementOperator", $this->paramView, "admin");
        } else {
            $this->redirect("/access-denied");
        }
    }

    private function foramtDaty(array $arrayItem): array
    {
        foreach ($arrayItem as &$item) {
            if (isset($item['last_login']) && !empty($item['last_login'])) {
                $date = new \DateTime($item['last_login']);
                $item['last_login'] = $date->format('d-m-Y H:i');
            }
        }
        return $arrayItem;
    }

    public function PwdUnlock(): void
    {
        $dashboardAdminMod = new ManagementOperatorModel($this->configuration);
        $data = [
            'pwdUnlock' => $this->request->postParam('pwd_unlock'),
            'pwdChange' => $this->request->postParam('pwd_change'),
            'pwd' => trim($this->request->postParam('pwd')),
            'pwdRepeat' => trim($this->request->postParam('pwd_repeat')),
            'id' => $this->request->postParam('id')
        ];

        if (!empty($data['pwdUnlock']) && $data['pwdUnlock'] === "on") {
            if ($dashboardAdminMod->accountUnloc("active", (int) $data['id'])) {
                flash("operatorsManagment", "Konto zostało odblokowane", "alert-login alert-login--confirm");
            } else {
                flash("operatorsManagment", "Coś poszło nie tak", "alert-login alert-login--error");
                $this->redirect("/operators");
            }
        }

        if (!empty($data['pwdChange']) && $data['pwdChange'] === "on") {

            if ($this->ValidPwd($data['pwd'], $data['pwdRepeat'])) {
                flash("operatorsManagment", "Niepoprawne hasła", "alert-login alert-login--error");
                $this->redirect("/operators");
            } else {
                $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

                if ($dashboardAdminMod->pwdChange($data['pwd'], (int) $data['id'])) {
                    flash("operatorsManagment", "Hasło zostało zmienione", "alert-login alert-login--confirm");
                } else {
                    flash("operatorsManagment", "Coś poszło nie tak", "alert-login alert-login--error");
                    $this->redirect("/operators");
                }
            }
        }

        if (empty($data['pwdUnlock']) || empty($data['pwdChange']) || empty($data['pwd']) || empty($data['pwdRepeat'])) {
            flash("operatorsManagment", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");
            $this->redirect("/operators");
        }

        $this->redirect("/operators");
    }

    public function accountDell(): void{
        $dashboardAdminMod = new ManagementOperatorModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id')
        ];
    
        if ($dashboardAdminMod->accountDell((int) $data['id'])) {
            flash("operatorsManagment", "Konto zostało usunięte", "alert-login alert-login--confirm");
            $this->redirect("/operators");
        } else {
            flash("operatorsManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/operators");
        }
    }

    public function accountEdit(): void{
        $dashboardAdminMod = new ManagementOperatorModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
            'login' => $this->request->postParam('login'),
            'name' => $this->request->postParam('name'),
            'lastName' => $this->request->postParam('lastName'),
            'phoneNumber' => $this->request->postParam('phoneNumber'),
            'email' => $this->request->postParam('email'),
            'houseNumber' => $this->request->postParam('houseNumber'),
            'street' => $this->request->postParam('street'),
            'town' => $this->request->postParam('town'),
            'zipCode' => $this->request->postParam('zipCode'),
            'city' => $this->request->postParam('city'),
            'privileges' => $this->request->postParam('privileges'),
            'status' => $this->request->postParam('status')
        ];

        if($this->IfEmpty($data)){
            flash("operatorsManagment", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/operators");
        };

        if($this->IfMaxLength($data, 30)){
            flash("operatorsManagment", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/operators");
        };

        //TODO bez znaków specjalnych i polskich
        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("operatorsManagment", "Niepoprawne znaki w nazwie", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("operatorsManagment", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        if($this->IfSpecialCharacters($data['lastName'])){
            flash("operatorsManagment", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO ralidacja numeru telefonu
        if($this->ValidPhoneNumber($data['phoneNumber'])){
            flash("operatorsManagment", "Niepoprawny numer telefonu", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO walidacj adresu email
        if($this->ValidEmail($data['email'])){
            flash("operatorsManagment", "Niepoprawny adres email", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("operatorsManagment", "Niepoprawny numer mieszkania", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO Walidacja tylko przeciwko znaków specjalnych
        if($this->IfSpecialCharacters($data['street'])){
            flash("operatorsManagment", "Niepoprawne znaki w nazwie ulicy", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("operatorsManagment", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("operatorsManagment", "Niepoprawny format kodu pocztowego", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("operatorsManagment", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }

        if($this->ValidPrivileges($data['privileges'])){
            flash("operatorsManagment", "Nieprawidłowe wartości w uprawnieniach", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }

        if($this->ValidStatus($data['status'])){
            flash("operatorsManagment", "Nieprawidłowe wartości w statusie konta", "alert-login alert-login--error");           
            $this->redirect("/operators");
        }
    
        if ($dashboardAdminMod->accountUpdate($data)) {
            flash("operatorsManagment", "Konto zostało zmodyfikowane", "alert-login alert-login--confirm");
            $this->redirect("/operators");
        } else {
            flash("operatorsManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/operators");
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
         empty($data['city'])) {
            return true;
        }else{
            return false;
        }
    }
}
