<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\User;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\OrderOperatorModel;

class OrderUserController extends AbstractController{

    public function OrderUserView() : Void{
        $this->userDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $orderOperatorModel = new OrderOperatorModel($this->configuration);

            if ($orderOperatorModel->showOrdersOperator($_SESSION['userId'])) {
                $this->paramView['orders'] = $this->orderParse($orderOperatorModel->showOrdersOperator($_SESSION['userId']));
            }

            (new View())->renderOperator("orderUser", $this->paramView, "user");
        }else{
            $this->redirect("/access-denied");
        }
    }

    public function orderAccept(): void{
        $orderOperatorModel = new OrderOperatorModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
        ];
        
        if (empty($data['id'])) {
            flash("orderUser", "Wymagany fomularz nie jest uzupełniony", "alert alert--error");  
            $this->redirect("/user/order");
        }

        if(!empty($orderOperatorModel->showActiveOrdersOperator($_SESSION['userId']))){
            flash("orderUser", "Masz już aktywne zlecenie", "alert alert--error");  
            $this->redirect("/user/order");
        }

        $data['status'] = "in progress";

        if ($orderOperatorModel->orderUpdateStatus($data)) {
            flash("orderUser", "Trasa została przyjęta do realizacji", "alert alert--confirm");
            $this->redirect("/user/order");
        } else {
            flash("orderUser", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/user/order");
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
                    'assigned_to' => $row['assigned_to'],
                    'locations' => []
                ];
            }
            $orders[$id_order]['locations'][] = [
                'origin_name' => $row['origin_location'],
                'destination_name' => $row['destination_location'],
                'origin_city' => $row['origin_city'],
                'destination_city' => $row['destination_city'],
                'origin_zip_code' => $row['origin_zip_code'],
                'destination_zip_code' => $row['destination_zip_code'],
                'origin_town' => $row['origin_town'],
                'destination_town' => $row['destination_town'],
                'origin_street' => $row['origin_street'],
                'destination_street' => $row['destination_street'],
                'origin_house_number' => $row['origin_house_number'],
                'destination_house_number' => $row['destination_house_number'],
                'departure_time' => $row['departure_time'],
                'arrival_time' => $row['arrival_time'],
                'id_route' => $row['id_route']
            ];
        }

        return $orders;
    }


}