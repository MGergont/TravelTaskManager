<?php
declare(strict_types=1);

namespace Src\Controllers;

use Src\Utils\Request;

abstract class AbstractController
{

    protected array $configuration = [];
    protected Request $request;
    protected array $paramView = [];

    public function __construct(Request $request)
    {
        $config = require_once("./Src/Config/PdoMySQLConf.php");
        $this->configuration = $config['db'];
        $this->request = $request;
    }
    
    public function redirect(string $url): void{
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $url, true, 303);
        exit;
    }

    public function adminDashboard(): void {
        if ($_SESSION['userGrant'] != 'admin') {
            $this->redirect("/access-denied");
        }
    }

    public function userDashboard(): void {
        if ($_SESSION['userGrant'] != 'user') {
            $this->redirect("/access-denied");
        }
    }

    public function managerDashboard(): void {
        if ($_SESSION['userGrant'] != 'manager') {
            $this->redirect("/access-denied");
        }
    }
}
