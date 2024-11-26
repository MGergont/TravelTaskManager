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
            
            if (!isset($_SESSION["orderStatus"])) {
                $_SESSION["orderStatus"] = 'test1';
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
    

    public function RoutsOrderClean():void {
        unset($_SESSION['date']);
        unset($_SESSION['nameOrder']);
        unset($_SESSION['user'] );
        unset($_SESSION['orderStatus']);
        $this->redirect("/manager/order");
    }
}