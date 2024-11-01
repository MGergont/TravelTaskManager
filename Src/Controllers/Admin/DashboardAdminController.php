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

            (new View())->renderAdmin("dashboardAdmin", $this->paramView, "admin");
        } else {
            $this->redirect("/access-denied");
        }
    }
}
