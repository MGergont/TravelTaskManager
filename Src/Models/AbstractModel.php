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
			echo "błąd powiązania pliku konfiguracji";
		}
	}

	private function createConnection(array $config): void{
	
		$dsn = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['database']};";
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

			// TODO baza danych offline
			// header('Location: http://' . $_SERVER['HTTP_HOST'] . "/access-denied", true, 500);
        	// exit;
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

	private function validateConfig(array $config): void {
		if (
		empty($config['database'])
		|| empty($config['host'])
		|| empty($config['port'])
		|| empty($config['user'])
		|| empty($config['password'])
		) {
		echo 'bład validacja :(';
		exit();
		}
	}

	public function getSettings(int $userId){
		$this->query('SELECT lang FROM public.operator WHERE id_operator = :userId;');
		$this->bind(':userId', $userId);
	
		$row = $this->singleArray();
	
		if($this->rowCount() == 1){
			if($row['lang'] == NULL){
				return false;
			}
			return $row;
		}else{
			return false;
		}
	  }
	
	  public function setSettings(int $userId, string $lang){
	
		$this->query('UPDATE public.operator SET lang = :lang WHERE id_operator = :userId;');
		$this->bind(':userId', $userId);
		$this->bind(':lang', $lang);
	
		if($this->execute()){
		  return true;
		}else{
		  return false;
		}
	  }

	  public function getSettingsAdmin(int $userId){
		$this->query('SELECT lang FROM public.admin WHERE id_admin = :userId;');
		$this->bind(':userId', $userId);
	
		$row = $this->singleArray();
		
		if($this->rowCount() == 1){
			if($row['lang'] == NULL){
				return false;
			}
			return $row;
		}else{
			return false;
		}
	  }
	
	  public function setSettingsAdmin(int $userId, string $theme, string $lang){
	
		$this->query('UPDATE public.admin SET lang = :lang WHERE id_admin = :userId;');
		$this->bind(':userId', $userId);
		$this->bind(':lang', $lang);
	
		if($this->execute()){
		  return true;
		}else{
		  return false;
		}
	  }
}
