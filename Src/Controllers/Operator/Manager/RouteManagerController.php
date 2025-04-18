<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\RouteModel;

class RouteManagerController extends AbstractController{

    public function RouteManagerView() : Void{
        $this->managerDashboard();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            $routModel = new RouteModel($this->configuration);

            if($result = $routModel->getSettings($_SESSION['userId'])){
                $this->paramView = $result;
            }

            if(empty($_SESSION['statusDel'])){
                $_SESSION['statusDel'] = "start";
            }

            $this->paramView['location'] = $routModel->getLocation($_SESSION['userId']);

            (new View())->renderOperator("routeManager", $this->paramView, "manager");
        }else{
            $this->redirect("/access-denied");
        }
    }

    public function startRoute() : Void{
        $routeMod = new RouteModel($this->configuration);
        $result = $routeMod->getIdDel($_SESSION['userId']);
        $_SESSION['id_del'] = $result['id_del'] + 1; 
        $_SESSION['StartRoute'] = trim($this->request->postParam('StartRoute'));
        $_SESSION['Distance'] = $this->request->postParam('Distance');
        $_SESSION['StopRoute'] = trim($this->request->postParam('StopRoute'));
        $_SESSION['startTrip'] = $this->getCurrentDateTime();

        $_SESSION['statusDel'] = "runtime";
        $this->redirect("/manager/route");
    }

    public function startNextRoute() : Void{
        $_SESSION['StartRoute'] = trim($this->request->postParam('StartRoute'));
        $_SESSION['Distance'] = $this->request->postParam('NextDistance');
        $_SESSION['StopRoute'] = trim($this->request->postParam('StopRoute'));
        $_SESSION['startTrip'] = $this->getCurrentDateTime();

        $_SESSION['statusDel'] = "runtime";
        $this->redirect("/manager/route");
    }

    public function stopRoute() : Void{
        $routeMod = new RouteModel($this->configuration);
        
        $_SESSION['stopTrip'] = $this->getCurrentDateTime();

        $data = [
            'id_del' => $_SESSION['id_del'],
            'StartRoute' => $_SESSION['StartRoute'],
            'Distance' => $_SESSION['Distance'],
            'StopRoute' => $_SESSION['StopRoute'],
            'startTrip' => $_SESSION['startTrip'],
            'stopTrip' => $_SESSION['stopTrip']
        ];

        $routeMod->addTrip($data, $_SESSION['userId']);

        $_SESSION['statusDel'] = "next";
        $this->redirect("/manager/route");
    }

    public function addCost() : Void{
        $routeMod = new RouteModel($this->configuration);

        $data = [
            'amount' => trim($this->request->postParam('amount')),
            'description' => trim($this->request->postParam('descript')),
            'id' => $_SESSION['id_del'],

        ];

        if (empty($data['amount']) || empty($data['description'])) {
            flash("route", "Wymagany fomularz nie jest uzupełniony", "alert alert--error");  
            $this->redirect("/manager/route");
        }

        //TODO Argument #1 ($string) must be of type string, int given in /var/www/testtravel.local
        // if($this->IfMaxLength($data, 250)){
        //     flash("route", "Nieprawidłowa długość znaków", "alert alert--error");           
        //     $this->redirect("/manager/route");
        // };

        if ($this->ValidFloatingNumbers($data['amount'])) {
            flash("route", "Niepoprawny znak", "alert alert--error");  
            $this->redirect("/manager/route");
        }
        

        if($routeMod->addCost($data, $_SESSION['userId'])){
            flash("route", "Udało się ", "alert alert--confirm");
            $this->redirect("/manager/route");
        }else{
            flash("route", "Nie udało się dodać", "alert alert--error");
            $this->redirect("/manager/route");
        }
    }

    public function endRoute() : Void{
        unset($_SESSION['id_del']);
        unset($_SESSION['StartRoute']);
        unset($_SESSION['Distance']);
        unset($_SESSION['StopRoute']);
        unset($_SESSION['startTrip']);
        unset($_SESSION['stopTrip']);
        unset($_SESSION['statusDel']);
        $this->redirect("/");
    }

    private function getCurrentDateTime() {
        $now = new \DateTime();
        
        return $now->format('Y-m-d H:i:s');
    }
}