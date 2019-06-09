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

  public function insertScore($score, $bankid, $user_hash){
    $sql = "SELECT * from fh_score WHERE id_client LIKE '".$user_hash."' AND id_banco LIKE '".$bankid."' ";
    $conn = mysqli_connect(DataManager::DB_HOST, DataManager::DB_USER, DataManager::DB_PASSWORD,DataManager::DB_NAME);


    if($res = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($res) > 0 ){
        while($row = mysqli_fetch_array($res)){
          $sql = "UPDATE `fh_score` SET `value` = '".$score."' WHERE `id_client` = '".$user_hash."' AND `id_banco` = '".$bankid."' ";
          echo "Dei update ".$sql ;

          return $this->conn->exec($sql);

        }
      }
      else{
        $sql = "INSERT INTO `fh_score` (`id`, `id_client`, `id_banco`, `value`) VALUES (NULL, '".$user_hash."', '".$bankid."', '".$score."')";
        echo "Dei insert ".$sql;
        return $this->conn->exec($sql);
      }
    }


  }


	public function __destruct() {
		$this->conn = null;
	}
}

$obj = new DataManager();


//main
echo $obj->insertScore($_POST['score'], $_POST['bankid'], md5($_POST['clientname'] + $_POST['clientcpf']));

 ?>
