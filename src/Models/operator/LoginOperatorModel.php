<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class LoginOperatorModel extends AbstractModel{

    public function login(string $nameOrEmail,string $password){
       
        $row = $this->findUserByEmail($nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->pwd;
    
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    public function updateLastLogin(int $userId){
        $this->query('UPDATE tenants SET last_login = NOW() WHERE id_tenant = :userId;');
        
        $this->bind(':userId', $userId);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

}