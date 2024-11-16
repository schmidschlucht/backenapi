<?php 

namespace Core;

use PDO;
include_once('config.php');
class Database
{
    private $host = DB_HOST;
    private $database = DB_NAME;
    private $dbname = DB_USER;
    private $password = DB_PASS;
    private $conn;

    public function connect():PDO
    {        
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, 
            $this->dbname, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }

    public function query($query, $data = []): array | bool
	{
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);

            $check = $stm->execute($data);
            if($check)
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($result) && count($result))
                {
                    return $result;
                }
            }
            return false;
        } catch(\Exception $e) {
            throw new MySQLException("fehler beim laden der daten!");
        }

	}

	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}
	

}