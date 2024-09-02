<?php

declare(strict_types=1);

namespace Src\Models;


use PDO;
use PDOException;

abstract class AbstractModel
{
  
  protected PDO $dbh;
  private $error;
  private $stmt;

  public function __construct(array $config)
  {
    try {
      $this->validateConfig($config);
      $this->createConnection($config);
    } catch (PDOException $e) {
      
    }
  }
  
  public function findUserByEmail($email){
    $this->query('SELECT * FROM tenants WHERE email = :email');
    $this->bind(':email', $email);

    $row = $this->single();

    if($this->rowCount() > 0){
        return $row;
    }else{
        return false;
    }
}

public function findUserByPESEL($pesel){
  $this->query('SELECT * FROM tenants WHERE pesel = :pesel');
  $this->bind(':pesel', $pesel);

  $row = $this->single();

  if($this->rowCount() > 0){
      return $row;
  }else{
      return false;
  }
}


  private function createConnection(array $config): void{
   
    $dsn = "mysql:host={$config['host']};dbname={$config['database']}";
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    try {
        $this->dbh = new PDO(
        $dsn,
        $config['user'],
        $config['password'],
        $options
    );
    } catch (PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error;
    }
  }

  public function query($sql): void{
    $this->stmt = $this->dbh->prepare($sql);
  }
  
  public function execute(){
    return $this->stmt->execute();
  }

  public function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function singleArray(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function allArray(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function rowCount(){
    return $this->stmt->rowCount();
  }

  public function getSettings(int $userId){
    $this->query('SELECT id_settings, theme, lang FROM settings WHERE id_tenant = :userId;');
    $this->bind(':userId', $userId);

    $row = $this->singleArray();

    if($this->rowCount() > 0){
        return $row;
    }else{
        return false;
    }
  }

  public function setSettings(int $userId, string $theme, string $lang){

    $this->query('INSERT INTO settings VALUES (NULL, :userId, :theme, :lang);');
    $this->bind(':userId', $userId);
    $this->bind(':theme', $theme);
    $this->bind(':lang', $lang);

    if($this->execute()){
      return true;
    }else{
      return false;
    }
  }
  
  private function showRent($id){
    $this->query('SELECT * FROM rent_apart WHERE id_tenant = :id;');
    
    $this->bind(':id', $id);

    $row = $this->singleArray();
    
    if($this->rowCount() > 0){
        return $row;
    }else{
        return false;
    }
  }


  public function setPay($iduser){

    $data = $this->showRent($iduser);

    $startDate = new \DateTime($data['start_rent']);
    $endDate = new \DateTime($data['stop_rent']);

    $currentDate = clone $startDate;

    while ($currentDate <= $endDate) {
        $dane = $currentDate->format('Y-m-d H:i:s');
        $nr_vat = "FV/".$currentDate->format('Y/m/d'). $_SESSION['usersId'];
        $currentDate->modify('+1 month');
        $this->query('INSERT INTO payments VALUES (NULL, NULL, :dane, NULL, "nowa", :nr_vat, :idwynajem)');
        $this->bind(':idwynajem', $data['id_rent_apart']);
        $this->bind(':dane', $dane);
        $this->bind(':nr_vat', $nr_vat);
        if(!$this->execute()){
          return false;
        }
    }
  }

  public function addNotifi(array $data, array $id){

    foreach($id as $ids){
        $this->query('INSERT INTO notifi VALUES (NULL, :notifiContent, :notifiFrom, :notifiTo, :id);');
        $this->bind(':notifiFrom', $data['notifiFrom']);
        $this->bind(':notifiTo', $data['notifiTo']);
        $this->bind(':notifiContent', $data['notifiContent']);
        $this->bind(':id', $ids['id_tenant']);
        if(!$this->execute()){
            return false;
        }
    } 

   return true;
}

  public function bind($param, $value, $type = null){
    if(is_null($type)){
        switch (true) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
    }
    $this->stmt->bindValue($param, $value, $type);
}

  private function validateConfig(array $config): void
  {

    if (
      empty($config['database'])
      || empty($config['host'])
      || empty($config['user'])
    ) {
      echo 'bład validacja :(';
      exit();
    }
  }
}
