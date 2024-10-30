<?php

declare(strict_types=1);

namespace Src\Models\Admin;

use PhpParser\Node\Expr\Cast\Bool_;
use Src\Models\AbstractModel;

class DashboardAdminModel extends AbstractModel{
    
    public function showOperators() : Array|Bool{
        $this->query('SELECT * FROM operator INNER JOIN address ON address.id_operator_fk = operator.id_operator;');
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function accountUnloc(string $status, int $idOperator) : Bool {
        $this->query('UPDATE operator SET login_error = 0, user_status = :status  WHERE id_operator = :idoperator');
        
        $this->bind(':status', $status);
        $this->bind(':idoperator', $idOperator);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function pwdChange(string $pwd, int $idOperator) : Bool {
        $this->query('UPDATE operator SET pwd = :pwd WHERE id_operator = :idoperator');
        
        $this->bind(':pwd', $pwd);
        $this->bind(':idoperator', $idOperator);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accountDell(int $idOperator) : Bool {
        $this->query('DELETE FROM operator WHERE id_operator = :idoperator');

        $this->bind(':idoperator', $idOperator);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accountUpdate(array $data) : Bool {
        $this->query('UPDATE public.operator SET login = :login, name = :name, last_name = :lastName, phone_number = :phoneNumber, email = :email WHERE id_operator = :idoperator');

        $this->bind(':login', $data['login']);
        $this->bind(':name', $data['name']);
        $this->bind(':lastName', $data['lastName']);
        $this->bind(':phoneNumber', $data['phoneNumber']);
        $this->bind(':email', $data['email']);
        //$this->bind(':privileges', $data['privileges']);
        $this->bind(':idoperator', $data['id']);

        if($this->execute()){
            return $this->accountAdresUpdate($data);;
        }else{
            return false;
        }
    }

    private function accountAdresUpdate(array $data) : Bool {
        $this->query('UPDATE public.address SET house_number = :houseNumber, street = :street, town = :town, zip_code = :zipCode, city = :city WHERE id_operator_fk = :idoperator');

        $this->bind(':houseNumber', $data['houseNumber']);
        $this->bind(':street', $data['street']);
        $this->bind(':town', $data['town']);
        $this->bind(':zipCode', $data['zipCode']);
        $this->bind(':city', $data['city']);
        $this->bind(':idoperator', $data['id']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

}