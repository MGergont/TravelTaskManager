<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\ManagementLocationModel;

class ManagementLocationController extends AbstractController
{
    public function ManagementLocationView(): Void
    {
        $this->managerDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $managementLocationModel = new ManagementLocationModel($this->configuration);

            $this->paramView['location'] = $managementLocationModel->showLocation();
            
            (new View())->renderOperator("locationManager", $this->paramView, "manager");
        } else {
            $this->redirect("/access-denied");
        }
    }

    public function locationDell(): void{
        $dashboardAdminMod = new ManagementLocationModel($this->configuration);
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

    public function locationEdit(): void{
        $dashboardAdminMod = new ManagementLocationModel($this->configuration);
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
            flash("operatorsManagment", "Lokalizacja zostałą dodana", "alert-login alert-login--confirm");
            $this->redirect("/operators");
        } else {
            flash("operatorsManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/operators");
        }
    }

    public function locationAdd(): void{
        $managementLocationMod = new ManagementLocationModel($this->configuration);
        $data = [
            'name' => $this->request->postParam('add_name'),
            'houseNumber' => $this->request->postParam('add_houseNumber'),
            'street' => $this->request->postParam('add_street'),
            'town' => $this->request->postParam('add_town'),
            'zipCode' => $this->request->postParam('add_zipCode'),
            'city' => $this->request->postParam('add_city'),
            'latitude' => $this->request->postParam('add_latitude'),
            'longitude' => $this->request->postParam('add_longitude')
        ];

        if($this->IfEmpty($data)){
            flash("locationManagment", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        };
        if($this->IfMaxLength($data, 30)){
            flash("locationManagment", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        };
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("locationManagment", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("locationManagment", "Niepoprawny numer mieszkania", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }
        if($this->IfSpecialCharacters($data['street'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie ulicy", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("locationManagment", "Niepoprawny format kodu pocztowego", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }
        
        if($this->ValidCoordinates($data['latitude'], $data['longitude'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }


        if ($managementLocationMod->locationAdd($data)) {
            flash("locationManagment", "Konto zostało zmodyfikowane", "alert-login alert-login--confirm");
            $this->redirect("/manager/location");
        } else {
            flash("locationManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/location");
        }
    }

    private function IfEmpty(array $data) :Bool {
        if (empty($data['name']) ||
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