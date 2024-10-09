<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\AddOperatorModel;

class DashboardAdminController extends AbstractController{

    public function DashboardAdminView() : Void{
        $this->adminDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){

        
            (new View())->renderAdmin("dashboardAdmin", $this->paramView, "admin");
        }else{
            $this->redirect("/access-denied");
        }
    }
}