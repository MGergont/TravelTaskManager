<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\DashboardAdminModel;

class DashboardAdminController extends AbstractController
{
    public function DashboardAdminView(): Void
    {
        $this->adminDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $dashboardAdminModel = new DashboardAdminModel($this->configuration);


            if($result = $dashboardAdminModel->showStatusOrders()){
                $this->paramView['StatusOrders'] = $result;
            }
            
            if($result = $dashboardAdminModel->showUserErrorLogin()){
                $this->paramView['ErrorLogin'] = $result;
            }
            
            if($result = $dashboardAdminModel->showStatusUser()){
                $this->paramView['StatusUser'] = $result;
            }

            if($result = $dashboardAdminModel->showQuery()){
                $this->paramView['Query'] = $result;
            }

            if($result = $dashboardAdminModel->showInactiveUsers()){
                $this->paramView['InactiveUsers'] = $result;
            }

            if($result = $dashboardAdminModel->showEmail()){
                $this->paramView['email'] = $result;
            }

            (new View())->renderAdmin("dashboardAdmin", $this->paramView, "admin");
        } else {
            $this->redirect("/access-denied");
        }
    }
}
