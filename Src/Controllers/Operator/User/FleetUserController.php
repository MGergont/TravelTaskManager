<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\User;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\DashboardUserModel;
class FleetUserController extends AbstractController{

    public function fleetUserView() : Void{
        $this->userDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){

            
            (new View())->renderOperator("fleetUser", $this->paramView, "user");
        }else{
            $this->redirect("/access-denied");
        }
    }
}
