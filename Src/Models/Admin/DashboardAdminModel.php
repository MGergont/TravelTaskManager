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

}