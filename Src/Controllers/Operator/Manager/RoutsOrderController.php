<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\RoutsOrderModel;
use Src\Models\ManagementLocationModel;

class RoutsOrderController extends AbstractController{

    public function RoutsOrderView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $routModel = new RoutsOrderModel($this->configuration);
            $locationModel = new ManagementLocationModel($this->configuration);

            if(empty($_SESSION['statusDel'])){
                $_SESSION['statusDel'] = "start";
            }

            if ($routModel->showOrders()) {
                $this->paramView['orders'] = $this->orderParse($routModel->showOrders());
            }
            

            $this->paramView['location'] = $locationModel->showLocation();

            (new View())->renderOperator("routsOrderManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }


    public function orderDellMain(): void{
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
        ];
        
        if (empty($data['id'])) {
            flash("orderManagment", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/manager/order");
        }

        if ($routModel->orderDellMain((int) $data['id'])) {
            flash("orderManagment", "Trasa została usunięta", "alert-login alert-login--confirm");
            $this->redirect("/manager/order");
        } else {
            flash("orderManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order");
        }
    }

    public function routeDellMain(): void{
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
        ];
        
        if (empty($data['id'])) {
            flash("orderManagment", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/manager/order");
        }

        if ($routModel->routeDellMain((int) $data['id'])) {
            flash("orderManagment", "Trasa została usunięta", "alert-login alert-login--confirm");
            $this->redirect("/manager/order");
        } else {
            flash("orderManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order");
        }
    }

    public function orderEditMain() : void {
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('edit_id'),
            'A' => $this->request->postParam('location_A_edit'),
            'B' => $this->request->postParam('location_B_edit'),
            'arrivalDate' => $this->request->postParam('arrival_date'),
            'departureDate' => $this->request->postParam('departure_date')
        ];

        
        if (empty($data['id']) || empty($data['A']) || empty($data['B'])) {
            flash("orderManagment", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/manager/order");
        }
        
        if (empty($data['departureDate'])) {
            $data['departureDate'] = NULL;
        }


        if (empty($data['arrivalDate'])) {
            $data['arrivalDate'] = NULL;
        }
        
        if ($routModel->orderEdit($data)) {
            flash("orderManagment", "Trasa zostałą zmodyfikowana", "alert-login alert-login--confirm");
            $this->redirect("/manager/order");
        } else {
            flash("orderManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order");
        }


    }
    
    public function orderAddMain() : Void {
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
            'locarionB' => $this->request->postParam('location_order_B'),
            'arrivalDate' => $this->request->postParam('arrival_date')
        ];

        if (empty($data['id']) ||  empty($data['locarionB'])) {
            flash("orderManagment", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/manager/order");
        }

        if (empty($data['arrivalDate'])) {
            $data['arrivalDate'] = null;
        }


        if ($routModel->routesAddMain($data, (int) $data['id'])) {
            flash("orderManagment", "Trasa zostałą zmodyfikowana", "alert-login alert-login--confirm");
            $this->redirect("/manager/order");
        } else {
            flash("orderManagment", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order");
        }

        
    }
    
    private function orderParse(Array $results) : Array {

        $orders = [];
        foreach ($results as $row) {
            $id_order = $row['id_order'];
            if (!isset($orders[$id_order])) {
                $date = new \DateTime($row['created_at']);
                $row['created_at'] = $date->format('d-m-Y H:i');
                $orders[$id_order] = [
                    'id_order' => $row['id_order'],
                    'order_name' => $row['order_name'],
                    'status_order' => $row['status_order'],
                    'created_at' => $row['created_at'],
                    'due_date' => $row['due_date'],
                    'locations' => []
                ];
            }
            $orders[$id_order]['locations'][] = [
                'origin_name' => $row['origin_location'],
                'destination_name' => $row['destination_location'],
                'origin_city' => $row['origin_city'],
                'destination_city' => $row['destination_city'],
                'id_route' => $row['id_route']
            ];
        }

        return $orders;
    }

    public function RoutsOrderAddView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $routModel = new RoutsOrderModel($this->configuration);
            $locationModel = new ManagementLocationModel($this->configuration);

            if(empty($_SESSION['statusDel'])){
                $_SESSION['statusDel'] = "start";
            }

            $this->paramView['users'] = $routModel->showOperator();
            $this->paramView['location'] = $locationModel->showLocation();

            if(isset($_SESSION["idOrder"])){
                $this->paramView['orderList'] = $routModel->showOrderList($_SESSION["idOrder"]);
            }
            

            if (!isset($_SESSION["orderStatus"])) {
                $_SESSION["orderStatus"] = 'start';
            }
 
            if($_SESSION["orderStatus"] === 'location'){
                $this->paramView['adresHome'] = $routModel->showAdress((int)$_SESSION['user']);
            }

            if($_SESSION["orderStatus"] === 'location2'){
                $this->paramView['locationA'] = $routModel->showLocationA($_SESSION["idRoute"]);
            }


            
            (new View())->renderOperator("routsOrderAddManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }


    public function orderAdd(): void{
        $data = [
            'nameOrder' => $this->request->postParam('name_order'),
            'user' => $this->request->postParam('user_order'),
            'date' => $this->request->postParam('date_due')
        ];

    
        if (empty($data['nameOrder']) || empty($data['user']) || empty($data['date'])) {
            flash("addOrder", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/manager/order/add");
        }

        if($this->IfMaxLength($data, 30)){
            flash("addOrder", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        };
        
        if($this->IfSpecialCharacters($data['nameOrder'])){
            flash("addOrder", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }

        if($this->ValidNumber($data['user'])){
            flash("addOrder", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }

        

        $_SESSION['date'] = $data['date'];
        $_SESSION['nameOrder'] = $data['nameOrder'];
        $_SESSION['user'] = $data['user'];
        $_SESSION["orderStatus"] = 'location';
        $this->redirect("/manager/order/add");
    }

    public function orderAddNextPoint(): void{
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'homeAdresTogle' => $this->request->postParam('home_adres_togle'),
            'idhomeNumber' => $this->request->postParam('id_home_location'),
            'locationA' => $this->request->postParam('location_order_A'),
            'departureDateA' => $this->request->postParam('departure_date_A'),
            'locarionB' => $this->request->postParam('location_order_B'),
            'arrivalDate' => $this->request->postParam('arrival_date'),
            'departureDateB' => $this->request->postParam('departure_date_B')
        ];

        if (empty($data['departureDateA'])) {
            $data['departureDateA'] = null;
        }
        if (empty($data['arrivalDate'])) {
            $data['arrivalDate'] = null;
        }
        if (empty($data['departureDateB'])) {
            $data['departureDateB'] = null;
        }

        if ($data['homeAdresTogle'] === NULL) {
            // TODO jest off
            if (empty($data['locationA']) || empty($data['locarionB'])) {
                flash("addOrder", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
                $this->redirect("/manager/order/add");
            }

            if ($data['locationA'] === $data['locarionB']) {
                flash("addOrder", "Podane lokalizacje są nieprawidłowe", "alert-login alert-login--error");  
                $this->redirect("/manager/order/add");
            }

        }else if ($data['homeAdresTogle'] === "on") {
            // TODO jest on
            if (empty($data['homeAdresTogle']) || empty($data['idhomeNumber']) || empty($data['locarionB'])) {
                flash("addOrder", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
                $this->redirect("/manager/order/add");
            }

            $dataAdres = $routModel->showAdress((int)$_SESSION['user']);

            if (!$routModel->showLocation((int)$_SESSION['user'], $dataAdres)) {
                $dataAdres['name'] = "home adress " . $_SESSION['user'];
                $dataAdres['latitude'] = 0;
                $dataAdres['longitude'] = 0;

                $id_result = $routModel->locationAddAndReturn($dataAdres);
            }else {
                $id_result = $routModel->showLocation((int)$_SESSION['user'], $dataAdres);
            }
            
            $data['locationA'] = $id_result['id_location'];
        }else{
            echo "błąd";
        }


        $data['date'] = $_SESSION['date'];
        $data['nameOrder'] = $_SESSION['nameOrder'];
        $data['user'] = $_SESSION['user'];

        $return = $routModel->orderAdd($data);

        if ($return !== false) {
            flash("addOrder", "Trasa została dodana", "alert-login alert-login--confirm");
        } else {
            flash("addOrder", "Coś poszło nie tak", "alert-login alert-login--error");
        }
        $_SESSION["departureDateB"] = $data['departureDateB'];
        $_SESSION["idOrder"] = $return['id_order'];
        $_SESSION["idRoute"] = $return['id_route'];
        $_SESSION["orderStatus"] = 'location2';
        $this->redirect("/manager/order/add");
    }
    
    public function orderAddEndPoint(): void{
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'locationA' => $this->request->postParam('location_order_A'),
            'locarionB' => $this->request->postParam('location_order_B'),
            'arrivalDate' => $this->request->postParam('arrival_date')
        ];

        if (empty($data['arrivalDate'])) {
            $data['arrivalDate'] = null;
        }
        
            if (empty($data['locationA']) || empty($data['locarionB'])) {
                flash("addOrder", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
                $this->redirect("/manager/order/add");
            }

            if ($data['locationA'] === $data['locarionB']) {
                flash("addOrder", "Podane lokalizacje są nieprawidłowe", "alert-login alert-login--error");  
                $this->redirect("/manager/order/add");
            }

        $data['departureDateA'] = $_SESSION["departureDateB"];

        if (empty($data['departureDateA'])) {
            $data['departureDateA'] = null;
        }

        $return = $routModel->routesAdd($data, $_SESSION["idOrder"]);

        if ($return !== false) {
            flash("addOrder", "Trasa została dodana", "alert-login alert-login--confirm");
        } else {
            flash("addOrder", "Coś poszło nie tak", "alert-login alert-login--error");
        }
        $_SESSION["idRoute"] = $return;

        $_SESSION["orderStatus"] = 'location2';
        $this->redirect("/manager/order/add");
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
            flash("addOrder", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        };
        if($this->IfMaxLength($data, 30)){
            flash("addOrder", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        };
        //TODO bez znaków specjalnych
        if($this->IfSpecialCharacters($data['name'])){
            flash("addOrder", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }
        //TODO Walidacjaj numeru domu
        if($this->ValidHouseNumber($data['houseNumber'])){
            flash("addOrder", "Niepoprawny numer mieszkania", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }
        if($this->IfSpecialCharacters($data['street'])){
            flash("addOrder", "Niepoprawne znaki w nazwie ulicy", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }
        if($this->IfSpecialCharacters($data['town'])){
            flash("addOrder", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }
        //TODO Walidacja kodu pocztowego XX-XXX
        if($this->ValidZipCode($data['zipCode'])){
            flash("addOrder", "Niepoprawny format kodu pocztowego", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }
        //TODO Walidacja nazwy miasta
        if($this->IfSpecialCharacters($data['city'])){
            flash("addOrder", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
            $this->redirect("/manager/order/add");
        }
        
        if(!empty($data['latitude']) && !empty($data['longitude'])){
            if($this->ValidCoordinates($data['latitude'], $data['longitude'])){
                flash("addOrder", "Niepoprawne znaki w nazwie miasta", "alert-login alert-login--error");           
                $this->redirect("/manager/order/add");
            }
        }else{
            $data['latitude'] = 0;
            $data['longitude'] = 0;
        }

        if ($managementLocationMod->locationAdd($data)) {
            flash("addOrder", "Konto zostało zmodyfikowane", "alert-login alert-login--confirm");
            $this->redirect("/manager/order/add");
        } else {
            flash("addOrder", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order/add");
        }
    }

    public function orderDell(): void{
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
        ];
        
        if (empty($data['id'])) {
            flash("addOrder", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");
            $this->redirect("/manager/order/add");
        }

        if ($routModel->orderDell((int) $data['id'])) {
            flash("addOrder", "Trasa została usunięta", "alert-login alert-login--confirm");
            $this->redirect("/manager/order/add");
        } else {
            flash("addOrder", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order/add");
        }
    }

    public function orderEdit() : void {
        $routModel = new RoutsOrderModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('edit_id'),
            'A' => $this->request->postParam('location_A_edit'),
            'B' => $this->request->postParam('location_B_edit'),
            'arrivalDate' => $this->request->postParam('arrival_date'),
            'departureDate' => $this->request->postParam('departure_date')
        ];

        
        if (empty($data['id']) || empty($data['A']) || empty($data['B'])) {
            flash("addOrder", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/manager/order/add");
        }
        
        if (empty($data['departureDate'])) {
            $data['departureDate'] = NULL;
        }


        if (empty($data['arrivalDate'])) {
            $data['arrivalDate'] = NULL;
        }

        if ($routModel->orderEdit($data)) {
            flash("addOrder", "Trasa zostałą zmodyfikowana", "alert-login alert-login--confirm");
            $this->redirect("/manager/order/add");
        } else {
            flash("addOrder", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/manager/order/add");
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

    public function RoutsOrderClean():void {
        unset($_SESSION['date']);
        unset($_SESSION['nameOrder']);
        unset($_SESSION['user'] );
        unset($_SESSION['orderStatus']);
        unset($_SESSION["departureDateB"]);
        unset($_SESSION["idRoute"]);
        unset($_SESSION["idOrder"]);
        unset($_SESSION['statusDel']);
        unset($_SESSION["idRoute"]);
        $this->redirect("/manager/order");
    }
}