<?php
class DataManager{
	const DB_HOST = 'localhost';
	const DB_NAME = 'u540903123_port';
	const DB_USER = 'u540903123_luke';
	const DB_PASSWORD = 'eV3BuvCV7CIM';

	private $conn = null;

	public function __construct(){
		$connectionString = sprintf("mysql:host=%s;dbname=%s",
				DataManager::DB_HOST,
				DataManager::DB_NAME);
		try {
			$this->conn = new PDO($connectionString,
					DataManager::DB_USER,
					DataManager::DB_PASSWORD);

		} catch (PDOException $pe) {
			die($pe->getMessage());
		}
	}


  public function insertUser($username){
    $sql = "INSERT INTO `fh_client` (`id`, `hash_id`) VALUES (NULL, '".$username."')";
    return $this->conn->exec($sql);
  }



	public function __destruct() {
		$this->conn = null;
	}
}

$obj = new DataManager();


//main
echo $obj->insertUser(md5($_POST['user_name'] + $_POST['cpf']));

 ?>
