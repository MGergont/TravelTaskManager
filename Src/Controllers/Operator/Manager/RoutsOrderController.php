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