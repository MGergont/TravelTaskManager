<?php

declare(strict_types=1);

namespace Src\Models\Admin;

use Src\Models\AbstractModel;

class AddOperatorModel extends AbstractModel{

    public function AddAdmin(array $data): Bool{

        $this->query('INSERT INTO public.admin (login, name, last_name, phone_number, email, pwd, last_login, user_status, user_grant, login_error) VALUES (:login, :name, :lastName, :phoneNumber, :email, :pwd, NOW(), :stats, :privileges, 0);');
        
        $this->bind(':login', $data['login']);
        $this->bind(':name', $data['name']);
        $this->bind(':lastName', $data['lastName']);
        $this->bind(':phoneNumber', $data['phoneNumber']);
        $this->bind(':email', $data['email']);
        $this->bind(':pwd', $data['pwd']);
        $this->bind(':stats', "new");
        $this->bind(':privileges', $data['privileges']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function AddOperator(array $data): Bool{

        $this->query('INSERT INTO public.operator (login, name, last_name, phone_number, email, pwd, last_login, user_status, user_grant) VALUES (:login, :name, :lastName, :phoneNumber, :email, :pwd, NOW(), :stats, :privileges);');
        
        $this->bind(':login', $data['login']);
        $this->bind(':name', $data['name']);
        $this->bind(':lastName', $data['lastName']);
        $this->bind(':phoneNumber', $data['phoneNumber']);
        $this->bind(':email', $data['email']);
        $this->bind(':pwd', $data['pwd']);
        $this->bind(':stats', "new");
        $this->bind(':privileges', $data['privileges']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function showIdNewUser(): Array|Bool{
        $this->query('SELECT MAX(id_operator) AS id_operator FROM operator WHERE user_status = :status LIMIT 1;');
        
        $this->bind(':status', "new");

        $row = $this->singleArray();
        
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function IfEmailExist(string $email, string $table): Bool{
        
        if ($table === "operator") {
            $this->query('SELECT email FROM operator WHERE email = :email');
        }elseif ($table === "admin") {
            $this->query('SELECT email FROM admin WHERE email = :email');
        }else{
            return false;
        }

        $this->bind(':email', $email);

        $this->execute();
        
        if($this->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }

    public function IfLoginExist(string $login, string $table){

        if ($table === "operator") {
            $this->query('SELECT login FROM operator WHERE login = :login');
        }elseif ($table === "admin") {
            $this->query('SELECT login FROM admin WHERE login = :login');
        }else{
            return false;
        }
        
        $this->bind(':login', $login);
        
        $this->execute();


        if($this->rowCount() == 0){
            return false;
        }else{
            return true;
        }
    }
    
    public function AddAddress($data, $idOperator): Bool{
        
        $this->query('INSERT INTO public.address (house_number, street, town, zip_code, city, id_operator_fk) VALUES (:houseNumber, :street, :town, :zipCode, :city, :operatorFK)');
        
        $this->bind(':houseNumber', $data['houseNumber']);
        $this->bind(':street', $data['street']);
        $this->bind(':town', $data['town']);
        $this->bind(':zipCode', $data['zipCode']);
        $this->bind(':city', $data['city']);
        $this->bind(':operatorFK', $idOperator);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}