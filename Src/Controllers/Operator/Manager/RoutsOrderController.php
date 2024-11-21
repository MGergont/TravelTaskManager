<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\RoutsOrderModel;

class RoutsOrderController extends AbstractController{

    public function RoutsOrderView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $routModel = new RoutsOrderModel($this->configuration);

            if(empty($_SESSION['statusDel'])){
                $_SESSION['statusDel'] = "start";
            }

            
            $this->paramView['orders'] = $this->orderParse($routModel->showOrders());
            
            (new View())->renderOperator("routsOrderManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }

    public function RoutsOrderAddView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $routModel = new RoutsOrderModel($this->configuration);

            if(empty($_SESSION['statusDel'])){
                $_SESSION['statusDel'] = "start";
            }

            $this->paramView['users'] = $routModel->showOperator();
            
            (new View())->renderOperator("routsOrderAddManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }

    public function locationAdd(): void{
        $routMod  = new RoutsOrderModel($this->configuration);
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

    
        // ifempty

        if($this->IfMaxLength($data, 30)){
            flash("locationManagment", "Nieprawidłowa długość znaków", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        };
        
        if($this->IfSpecialCharacters($data['name'])){
            flash("locationManagment", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert-login alert-login--error");           
            $this->redirect("/manager/location");
        }

        // if ($routMod->locationAdd($data)) {
        //     flash("locationManagment", "Konto zostało zmodyfikowane", "alert-login alert-login--confirm");
        //     $this->redirect("/manager/location");
        // } else {
        //     flash("locationManagment", "Coś poszło nie tak", "alert-login alert-login--error");
        //     $this->redirect("/manager/location");
        // }
    }

    
    private function orderParse(Array $results) : Array {

        $orders = [];
        foreach ($results as $row) {
            $id_order = $row['id_order'];
            if (!isset($orders[$id_order])) {
                $orders[$id_order] = [
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
                'destination_city' => $row['destination_city']
            ];
        }

        return $orders;
    }
    
}