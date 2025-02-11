<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;


class FleetManagerController extends AbstractController{

    public function fleetManagerView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){

            (new View())->renderOperator("fleetManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }

    
}