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
    
    protected function redirect(string $url): void{
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $url, true, 303);
        exit;
    }

    protected function adminDashboard(): void {
        if ($_SESSION['userGrant'] != 'admin') {
            $this->redirect("/access-denied");
        }
    }

    protected function userDashboard(): void {
        if ($_SESSION['userGrant'] != 'user') {
            $this->redirect("/access-denied");
        }
    }

    protected function managerDashboard(): void {
        if ($_SESSION['userGrant'] != 'manager') {
            $this->redirect("/access-denied");
        }
    }

    protected function IfMaxLength(array $data, int $length) : Bool {
        foreach ($data as $leng) {
            if (strlen($leng) >= $length) {
                return true;
            }
        }
        return false;
    }

    protected function IfSpecialAndPolishCharacters(string $data) : Bool {
        if(!preg_match("/^[a-zA-Z0-9.]*$/", $data)){
            return true;
        }else{
            return false;
        }
    }
    
    protected function ValidPhoneNumber(string $data) : Bool {
        if(!strlen($data) == 9){
            return true;
        }else if(!preg_match('/^[0-9]{9,9}$/', $data)){
            return true;
        }
        return false;
    }

    protected function IfSpecialCharacters(string $data) : Bool {
        if(!preg_match('/^[a-zA-ZĄĆĘŁŃÓŚŹŻąćęłńóśźż]+$/u', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    protected function ValidFloatingNumbers(string $data) : Bool {
        if(!preg_match('/^[0-9]{1,13}(\.[0-9]{1,2})?$/', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    protected function ValidEmail(string $data) : Bool {
        if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    
    protected function ValidHouseNumber(string $houseNumber) : Bool {
        if (!preg_match('/^[0-9]+[a-zA-Z]?$/', $houseNumber)) {
            return true;  
        } else {
            return false;
        }
    }

    protected function ValidZipCode(string $zipCode) : Bool {
        if (!preg_match('/^[0-9]{2}\-[0-9]{3}$/', $zipCode)) {
            return true;  
        } else {
            return false;
        }
    }

    protected function ValidPrivileges(string $data) : Bool {
        switch ($data) {
            case 'admin':
                return false;
                break;
            case 'manager':
                return false;
                break;
            case 'user':
                return false;
                break;
            default:
                return true;
                break;
        }
    }

    protected function ValidStatus(string $data) : Bool {
        switch ($data) {
            case 'new':
                return false;
                break;
            case 'block':
                return false;
                break;
            case 'active':
                return false;
                break;
            default:
                return true;
                break;
        }
    }

    protected function ValidPwd(string $pwd, string $pwdRepeat) : Bool {
        if(strlen($pwd) < 6){
            return true;
        }else if($pwd !== $pwdRepeat){
            return true;
        }
        return false;
    }

    protected function IfStatus(string $status, string $statusExpected) : Bool {
        if($status === $statusExpected){
            return true;
        }else{
            return false;
        }
    }

    protected function LoginErrorValid(int $currentState, int $maxError) : Bool {
        if($currentState >= $maxError){
            return true;
        }else{
            return false;
        }
    }

    protected function ValidCoordinates($latitude, $longitude) : Bool {
        $latitudePattern = '/^(-?([0-8]?[0-9](\.[0-9]+)?|90(\.0+)?))$/';
        $longitudePattern = '/^(-?((1[0-7][0-9]|[0-9]?[0-9])(\.[0-9]+)?|180(\.0+)?))$/';
    
        if (!preg_match($latitudePattern, $latitude)) {
            return true;
        }
        
        if (!preg_match($longitudePattern, $longitude)) {
            return true;
        }

        return false;
    }
}
