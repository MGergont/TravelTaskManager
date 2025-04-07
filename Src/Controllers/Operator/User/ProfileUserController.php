<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\User;

use Src\Views\View;
use Src\Controllers\AbstractController;

class ProfileUserController extends AbstractController
{

    public function ProfileView(): Void{
        $this->userDashboard();
        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {

            (new View())->renderOperator("profileUser", $this->paramView, "user");
        } else {
            $this->redirect("/access-denied");
        }
    }

}
