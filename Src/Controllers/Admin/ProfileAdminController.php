<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;

class ProfileAdminController extends AbstractController
{
    public function ProfileAdminView(): Void{
        $this->adminDashboard();
        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            

            (new View())->renderAdmin("profileAdmin", $this->paramView, "admin");
        } else {
            $this->redirect("/access-denied");
        }
    }
}
