<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Models\Admin\LoginAdminModel;
use Src\Controllers\AbstractController;

class AddOperatorController extends AbstractController{

    public function AddOperatorView() : Void{

        if(isset($_SESSION['status']) && $_SESSION['status'] = "login"){
            //BUG $this->redirectGrant($_SESSION['userGrant']);
        }else{
            (new View())->renderAdmin("registerAdmin", $this->paramView, "");
        }
    }

}