<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\User;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\DashboardUserModel;

class DashboardUserController extends AbstractController{

    public function DashboardUserView() : Void{
        $this->userDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $dashboardUserModel = new DashboardUserModel($this->configuration);
            if (!isset($_SESSION['action'])) {
                $_SESSION['action'] = "start";
            }

            if ($dashboardUserModel->showOrdersOperator($_SESSION['userId'])) {
                $this->paramView['orders'] = $dashboardUserModel->showOrdersOperator($_SESSION['userId']);
                $_SESSION['order_id'] = $this->paramView['orders']["id_order"];

                 $dashboardUserModel->showActivePart($this->paramView['orders']["id_route"]);

                if ($test = $dashboardUserModel->showActivePart($this->paramView['orders']["id_route"])) {
                    
                    if($test['departure_time_active'] == NULL){
                        $_SESSION['action'] = "start";
                    }elseif ($test['arrival_time_active'] == NULL) {
                        $_SESSION['action'] = "stop";
                    } else {
                        flash("dashboard", "Nie wykryto punktu", "alert-login alert-login--error");  
                        $this->redirect("/user-dashboard");
                    }
                }

                // if (isset($_SESSION['action']) && $_SESSION['action'] == 'repet') {
                //     $_SESSION['action'] = "start";
                // }
            }elseif (isset($_SESSION['order_id'])) {
                if ($dashboardUserModel->orderUpdateStatus((int) $_SESSION['order_id'], "reject")) {
                    flash("dashboard", "Trasa została zakończona", "alert-login alert-login--confirm");
                    unset($_SESSION['order_id']);
                } else {
                    flash("dashboard", "Coś poszło nie tak", "alert-login alert-login--error");
                }
            }
            
            

            (new View())->renderOperator("dashboardUser", $this->paramView, "user");
        }else{
            $this->redirect("/access-denied");
        }
    }

    public function RouteStart() : Void{
        $dashboardUserModel = new DashboardUserModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id_route'),
        ];
        
        if (empty($data['id'])) {
            flash("dashboard", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/user-dashboard");
        }

        if ($dashboardUserModel->updateRouteDepartureTime($data)) {
            flash("dashboard", "Trasa została przyjęta do realizacji", "alert-login alert-login--confirm");
            $_SESSION['action'] = "stop";
            $this->redirect("/user-dashboard");
        } else {
            flash("dashboard", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/user-dashboard");
        }

    }

    public function RouteStop() : Void{
        $dashboardUserModel = new DashboardUserModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id_route'),
        ];
        
        if (empty($data['id'])) {
            flash("dashboard", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/user-dashboard");
        }

        if ($dashboardUserModel->updateRouteArrivalTime($data)) {
            flash("dashboard", "Trasa została przyjęta do realizacji", "alert-login alert-login--confirm");
            $_SESSION['action'] = "repet";
            $this->redirect("/user-dashboard");
        } else {
            flash("dashboard", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/user-dashboard");
        }

    }

    public function RejectOrder() : Void{
        $dashboardUserModel = new DashboardUserModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id_order'),
        ];
        
        if (empty($data['id'])) {
            flash("dashboard", "Wymagany fomularz nie jest uzupełniony", "alert-login alert-login--error");  
            $this->redirect("/user-dashboard");
        }

        if ($dashboardUserModel->orderUpdateStatus((int) $data['id'], "reject")) {
            flash("dashboard", "Trasa została odrzucona", "alert-login alert-login--confirm");
            $this->redirect("/user-dashboard");
        } else {
            flash("dashboard", "Coś poszło nie tak", "alert-login alert-login--error");
            $this->redirect("/user-dashboard");
        }

    }
}