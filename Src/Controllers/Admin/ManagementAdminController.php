<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\ManagementAdminModel;

class ManagementAdminController extends AbstractController
{
    public function ManagementAdminView(): Void
    {
        $this->adminDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $dashboardAdminModel = new ManagementAdminModel($this->configuration);

            $arrayUsers = $dashboardAdminModel->showOperators();

            $this->paramView['operators'] = $this->foramtDaty($arrayUsers);

            (new View())->renderAdmin("managementAdmin", $this->paramView, "admin");
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
        $dashboardAdminMod = new ManagementAdminModel($this->configuration);
        $data = [
            'pwdUnlock' => $this->request->postParam('pwd_unlock'),
            'pwdChange' => $this->request->postParam('pwd_change'),
            'pwd' => trim($this->request->postParam('pwd')),
            'pwdRepeat' => trim($this->request->postParam('pwd_repeat')),
            'id' => $this->request->postParam('id')
        ];

        if (!empty($data['pwdUnlock']) && $data['pwdUnlock'] === "on") {
            if ($dashboardAdminMod->accountUnloc("active", (int) $data['id'])) {
                flash("adminManagement", "Konto zostało odblokowane", "alert-login alert-login--confirm");
            } else {
                flash("adminManagement", "Coś poszło nie tak", "alert-login alert-login--error");
                $this->redirect("/admins");
            }
        }

        if (!empty($data['pwdChange']) && $data['pwdChange'] === "on") {

            if ($this->ValidPwd($data['pwd'], $data['pwdRepeat'])) {
                flash("adminManagement", "Niepoprawne hasła", "alert-login alert-login--error");
                $this->redirect("/admins");
            } else {
                $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

                if ($dashboardAdminMod->pwdChange($data['pwd'], (int) $data['id'])) {
                    flash("adminManagement", "Hasło zostało zmienione", "alert-login alert-login--confirm");
                } else {
                    flash("adminManagement", "Coś poszło nie tak", "alert-login alert-login--error");
                    $this->redirect("/admins");
                }
            }
        }

        if (empty($data['pwdUnlock']) || empty($data['pwdChange']) || empty($data['pwd']) || empty($data['pwdRepeat'])) {
            flash("adminManagement", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");
            $this->redirect("/admins");
        }

        $this->redirect("/admins");
    }

    public function accountDell(): void{
        $dashboardAdminMod = new ManagementAdminModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id')
        ];
    
        if ($dashboardAdminMod->accountDell((int) $data['id'])) {
            flash("adminManagement", "Konto zostało usunięte", "alert-login alert-login--confirm");
            $this->redirect("/admins");
        } else {
            flash("adminManagement", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/admins");
        }
    }

    public function accountEdit(): void{
        $dashboardAdminMod = new ManagementAdminModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
            'login' => $this->request->postParam('login'),
            'name' => $this->request->postParam('name'),
            'lastName' => $this->request->postParam('lastName'),
            'phoneNumber' => $this->request->postParam('phoneNumber'),
            'email' => $this->request->postParam('email'),
            'status' => $this->request->postParam('status')
        ];

        if($this->IfEmpty($data)){
            flash("adminManagement", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/admins");
        };

        if($this->IfMaxLength($data, 30)){
            flash("adminManagement", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/admins");
        };
        //TODO bez znaków specjalnych i polskich
        if($this->IfSpecialAndPolishCharacters($data['login'])){
            flash("adminManagement", "Niepoprawne znaki w nazwie", "alert-login alert-login--error");           
            $this->redirect("/admins");
        }
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("adminManagement", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/admins");
        }
        if($this->IfSpecialCharacters($data['lastName'])){
            flash("adminManagement", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/admins");
        }
        //TODO ralidacja numeru telefonu
        if($this->ValidPhoneNumber($data['phoneNumber'])){
            flash("adminManagement", "Niepoprawny numer telefonu", "alert-login alert-login--error");           
            $this->redirect("/admins");
        }
        //TODO walidacj adresu email
        if($this->ValidEmail($data['email'])){
            flash("adminManagement", "Niepoprawny adres email", "alert-login alert-login--error");           
            $this->redirect("/admins");
        }

        if($this->ValidStatus($data['status'])){
            flash("adminManagement", "Nieprawidłowe wartości w statusie konta", "alert-login alert-login--error");           
            $this->redirect("/admins");
        }
    
        if ($dashboardAdminMod->accountUpdate($data)) {
            flash("adminManagement", "Konto zostało zmodyfikowane", "alert-login alert-login--confirm");
            $this->redirect("/admins");
        } else {
            flash("adminManagement", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/admins");
        }
    }

    private function IfEmpty(array $data) :Bool {
        if (empty($data['login']) ||
         empty($data['name']) ||
         empty($data['lastName']) ||
         empty($data['phoneNumber']) ||
         empty($data['email'])) {
            return true;
        }else{
            return false;
        }
    }
}
