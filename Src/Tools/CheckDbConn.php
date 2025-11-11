<?php

declare(strict_types=1);

namespace Src\Tools;

use Src\Models\AbstractModel;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Src/Tools/bootstrap.php';

class CheckDbConn extends AbstractModel{

    public function DbVersion(): bool|array{
        $this->query('SELECT version();');
        
        $row = $this->singleArray();
        
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

}

$config = require_once __DIR__ . '/../../Src/Config/PdoMySQLConf.php';

$config2 = $config['db'];

$TestowyModel = new CheckDbConn($config2);

if($TestowyModel->DbVersion()){

    $result = $TestowyModel->DbVersion();
    echo "Werjsa bazy". $result['version'];
}else{
    echo "baza jest nieosiągalna";
}

exit();