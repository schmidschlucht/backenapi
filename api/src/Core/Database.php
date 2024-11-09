<?php 

namespace Core;

use PDO;

include_once('config.php');
    
class Database {

    public $dsn;    

    public function getConnection():PDO {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        return new PDO($dsn, DB_USER, DB_PASS, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false,
            ));
    }
}
    
?>