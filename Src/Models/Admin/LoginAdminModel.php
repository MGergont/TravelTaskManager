<?php

declare(strict_types=1);

namespace Src\Models\Admin;

use Src\Models\AbstractModel;

class LoginAdminModel extends AbstractModel{

    public function findUserByLogin(string $login): Bool|Object{
		$this->query('SELECT * FROM public.admin WHERE login = :login');
        $this->bind(':login', $login);

        $row = $this->single();

        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
	}

    public function updateLastLogin(int $userId): Bool{
        $this->query('UPDATE public.admin SET last_login = NOW() WHERE id_admin = :userId;');
        
        $this->bind(':userId', $userId);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateLoginError(int $userId, int $error): Bool{
        $this->query('UPDATE public.admin SET last_login = NOW() WHERE id_admin = :userId;');
        
        $this->bind(':userId', $userId);
        $this->bind(':userId', $error);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}