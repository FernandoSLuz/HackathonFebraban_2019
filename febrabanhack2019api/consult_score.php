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

  public function consultScore($userhash){
    $sql = "SELECT * from fh_score WHERE id_client LIKE '".$userhash."'";
    $conn = mysqli_connect(DataManager::DB_HOST, DataManager::DB_USER, DataManager::DB_PASSWORD,DataManager::DB_NAME);



    if($res = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($res) > 0 ){
				$resultarray = array();
        while($row = mysqli_fetch_array($res)){
          //echo $row['value']."<br>";
					array_push($resultarray, $row['value']);
        }
				echo json_encode($resultarray);
      }
      else{
        echo "user not found";
      }
    }
  }

	public function __destruct() {
		$this->conn = null;
	}
}

$obj = new DataManager();


//main
$obj->consultScore(md5($_POST['user_name'] + $_POST['cpf']));

 ?>
