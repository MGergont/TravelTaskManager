<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class LoginOperatorModel extends AbstractModel{

    public function findUserByLogin(string $login): Bool|Object{
		$this->query('SELECT * FROM public.operator WHERE login = :login');
        $this->bind(':login', $login);

        $row = $this->single();

        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
	}

    public function updateLastLogin(int $userId): Bool{
        $this->query('UPDATE public.operator SET last_login = NOW() WHERE id_operator = :userId;');
        
        $this->bind(':userId', $userId);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateLoginError(int $userId, int $error): Bool{
        $this->query('UPDATE public.operator SET login_error = :error WHERE id_operator = :userId;');
        
        $this->bind(':userId', $userId);
        $this->bind(':error', $error);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateStatusAccount(int $userId, string $status): Bool{
        $this->query('UPDATE public.operator SET user_status = :status WHERE id_operator = :userId;');
        
        $this->bind(':userId', $userId);
        $this->bind(':status', $status);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

}