<?php

declare(strict_types=1);

namespace Src\Models\Admin;

use Src\Models\AbstractModel;

class ManagementAdminModel extends AbstractModel{
    
    public function showOperators() : Array|Bool{
        $this->query('SELECT * FROM admin');
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function accountUnloc(string $status, int $idAdmin) : Bool {
        $this->query('UPDATE admin SET login_error = 0, user_status = :status  WHERE id_admin = :idadmin');
        
        $this->bind(':status', $status);
        $this->bind(':idadmin', $idAdmin);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function pwdChange(string $pwd, int $idAdmin) : Bool {
        $this->query('UPDATE admin SET pwd = :pwd WHERE id_admin = :idadmin');
        
        $this->bind(':pwd', $pwd);
        $this->bind(':idadmin', $idAdmin);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accountDell(int $idAdmin) : Bool {
        $this->query('DELETE FROM admin WHERE id_admin = :idadmin');

        $this->bind(':idadmin', $idAdmin);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accountUpdate(array $data) : Bool {
        $this->query('UPDATE admin SET login = :login, name = :name, last_name = :lastName, phone_number = :phoneNumber, email = :email, user_status = :status WHERE id_admin = :idadmin');

        $this->bind(':login', $data['login']);
        $this->bind(':name', $data['name']);
        $this->bind(':lastName', $data['lastName']);
        $this->bind(':phoneNumber', $data['phoneNumber']);
        $this->bind(':email', $data['email']);
        $this->bind(':status', $data['status']);
        $this->bind(':idadmin', $data['id']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}