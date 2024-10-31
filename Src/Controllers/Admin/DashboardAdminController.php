<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\DashboardAdminModel;

class DashboardAdminController extends AbstractController
{
    public function DashboardAdminView(): Void
    {
        $this->adminDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $dashboardAdminModel = new DashboardAdminModel($this->configuration);

            $arrayUsers = $dashboardAdminModel->showOperators();

            $this->paramView['operators'] = $this->foramtDaty($arrayUsers);

            (new View())->renderAdmin("dashboardAdmin", $this->paramView, "admin");
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
        $dashboardAdminMod = new DashboardAdminModel($this->configuration);
        $data = [
            'pwdUnlock' => $this->request->postParam('pwd_unlock'),
            'pwdChange' => $this->request->postParam('pwd_change'),
            'pwd' => trim($this->request->postParam('pwd')),
            'pwdRepeat' => trim($this->request->postParam('pwd_repeat')),
            'id' => $this->request->postParam('id')
        ];

        if (!empty($data['pwdUnlock']) && $data['pwdUnlock'] === "on") {
            if ($dashboardAdminMod->accountUnloc("active", (int) $data['id'])) {
                flash("pwdUnlock", "Konto zostało odblokowane", "alert-login alert-login--confirm");
            } else {
                flash("pwdUnlock", "Coś poszło nie tak", "alert-login alert-login--error");
                $this->redirect("/admin-dashboard");
            }
        }

        if (!empty($data['pwdChange']) && $data['pwdChange'] === "on") {

            if ($this->ValidPwd($data['pwd'], $data['pwdRepeat'])) {
                flash("pwdUnlock", "Niepoprawne hasła", "alert-login alert-login--error");
                $this->redirect("/admin-dashboard");
            } else {
                $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

                if ($dashboardAdminMod->pwdChange($data['pwd'], (int) $data['id'])) {
                    flash("pwdUnlock", "Hasło zostało zmienione", "alert-login alert-login--confirm");
                } else {
                    flash("pwdUnlock", "Coś poszło nie tak", "alert-login alert-login--error");
                    $this->redirect("/admin-dashboard");
                }
            }
        }

        if (empty($data['pwdUnlock']) || empty($data['pwdChange']) || empty($data['pwd']) || empty($data['pwdRepeat'])) {
            flash("pwdUnlock", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");
            $this->redirect("/admin-dashboard");
        }

        $this->redirect("/admin-dashboard");
    }

    public function accountDell(): void{
        $dashboardAdminMod = new DashboardAdminModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id')
        ];
    
        if ($dashboardAdminMod->accountDell((int) $data['id'])) {
            flash("pwdUnlock", "Konto zostało usunięte", "alert-login alert-login--confirm");
            $this->redirect("/admin-dashboard");
        } else {
            flash("pwdUnlock", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/admin-dashboard");
        }
    }

    public function accountEdit(): void{
        $dashboardAdminMod = new DashboardAdminModel($this->configuration);
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
            flash("pwdUnlock", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        };

        if($this->IfMaxLength($data, 30)){
            flash("pwdUnlock", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        };

        //TODO bez znaków specjalnych i polskich
        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("pwdUnlock", "Niepoprawne znaki w nazwie", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("pwdUnlock", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        if($this->IfSpecialCharacters($data['lastName'])){
            flash("pwdUnlock", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO ralidacja numeru telefonu
        if($this->ValidPhoneNumber($data['phoneNumber'])){
            flash("pwdUnlock", "Niepoprawny numer telefonu", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO walidacj adresu email
        if($this->ValidEmail($data['email'])){
            flash("pwdUnlock", "Niepoprawny adres email", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("pwdUnlock", "Niepoprawny numer mieszkania", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO Walidacja tylko przeciwko znaków specjalnych
        if($this->IfSpecialCharacters($data['street'])){
            flash("pwdUnlock", "Niepoprawne znaki w nazwie ulicy", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("pwdUnlock", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("pwdUnlock", "Niepoprawny format kodu pocztowego", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("pwdUnlock", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }

        if($this->ValidPrivileges($data['privileges'])){
            flash("pwdUnlock", "Nieprawidłowe wartości w uprawnieniach", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }

        if($this->ValidStatus($data['status'])){
            flash("pwdUnlock", "Nieprawidłowe wartości w statusie konta", "alert-login alert-login--error");           
            $this->redirect("/admin-dashboard");
        }
    
        if ($dashboardAdminMod->accountUpdate($data)) {
            flash("pwdUnlock", "Konto zostało zmodyfikowane", "alert-login alert-login--confirm");
            $this->redirect("/admin-dashboard");
        } else {
            flash("pwdUnlock", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/admin-dashboard");
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
