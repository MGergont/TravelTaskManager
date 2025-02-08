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
        $managementLocationMod = new ManagementLocationModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id')
        ];
    
        if ($managementLocationMod->locationDell((int) $data['id'])) {
            flash("locationManagment", "Konto zostało usunięte", "alert alert--confirm");
            $this->redirect("/manager/location");
        } else {
            flash("locationManagment", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/location");
        }
    }

    public function locationEdit(): void{
        $managementLocationMod = new ManagementLocationModel($this->configuration);
        $data = [
            'name' => $this->request->postParam('edit_name'),
            'houseNumber' => $this->request->postParam('edit_houseNumber'),
            'street' => $this->request->postParam('edit_street'),
            'town' => $this->request->postParam('edit_town'),
            'zipCode' => $this->request->postParam('edit_zipCode'),
            'city' => $this->request->postParam('edit_city'),
            'latitude' => $this->request->postParam('edit_latitude'),
            'longitude' => $this->request->postParam('edit_longitude'),
            'id' => $this->request->postParam('edit_id')
        ];

        if($this->IfEmpty($data)){
            flash("locationManagment", "Nie uzupełniono odpowiednich formularzy", "alert alert--error");           
            $this->redirect("/manager/location");
        };
        if($this->IfMaxLength($data, 30)){
            flash("locationManagment", "Nieprawidłowa długość znaków", "alert alert--error");           
            $this->redirect("/manager/location");
        };
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("locationManagment", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("locationManagment", "Niepoprawny numer mieszkania", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        if($this->IfSpecialCharacters($data['street'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie ulicy", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("locationManagment", "Niepoprawny format kodu pocztowego", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        
        if(!empty($data['latitude']) && !empty($data['longitude'])){
            if($this->ValidCoordinates($data['latitude'], $data['longitude'])){
                flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert alert--error");           
                $this->redirect("/manager/location");
            }
        }else{
            $data['latitude'] = 0;
            $data['longitude'] = 0;
        }

        if ($managementLocationMod->locationUpdate($data)) {
            flash("locationManagment", "Lokalizacja została zmodyfikowane", "alert alert--confirm");
            $this->redirect("/manager/location");
        } else {
            flash("locationManagment", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/location");
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
            flash("locationManagment", "Nie uzupełniono odpowiednich formularzy", "alert alert--error");           
            $this->redirect("/manager/location");
        };
        if($this->IfMaxLength($data, 30)){
            flash("locationManagment", "Nieprawidłowa długość znaków", "alert alert--error");           
            $this->redirect("/manager/location");
        };
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("locationManagment", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("locationManagment", "Niepoprawny numer mieszkania", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        if($this->IfSpecialCharacters($data['street'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie ulicy", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("locationManagment", "Niepoprawny format kodu pocztowego", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert alert--error");           
            $this->redirect("/manager/location");
        }
        
        if(!empty($data['latitude']) && !empty($data['longitude'])){
            if($this->ValidCoordinates($data['latitude'], $data['longitude'])){
                flash("locationManagment", "Niepoprawne znaki w nazwie miasta", "alert alert--error");           
                $this->redirect("/manager/location");
            }
        }else{
            $data['latitude'] = 0;
            $data['longitude'] = 0;
        }

        if ($managementLocationMod->locationAdd($data)) {
            flash("locationManagment", "Konto zostało zmodyfikowane", "alert alert--confirm");
            $this->redirect("/manager/location");
        } else {
            flash("locationManagment", "Coś poszło nie tak", "alert alert--error");
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