<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\DashboardManagerModel;

class DashboardManagerController extends AbstractController{

    public function DashboardManagerView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $dashboardManagerModel = new DashboardManagerModel($this->configuration);

            if($result = $dashboardManagerModel->showActiveCar()){
                $this->paramView['ActiveCar'] = $result;
            }
            
            if($result = $dashboardManagerModel->showBiggestCostsCar()){
                $this->paramView['carCost'] = $result;
            }
            
            if($result = $dashboardManagerModel->showStatusOrders()){
                $this->paramView['StatusOrders'] = $result;
            }

            if($result = $dashboardManagerModel->showEndInsurance()){
                $this->paramView['EndInsurance'] = $result;
            }

            (new View())->renderOperator("dashboardManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }

    
}