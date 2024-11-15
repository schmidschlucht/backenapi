<?php

namespace Core;



class MySQLException extends \Exception {

    public function errorMessage(): string {
        $errorMsg = "MySQL Exeption: Zeile {$this->getLine()}  in  {$this->getFile()} ist der Fehler {$this->getMessage()}";
        return $errorMsg;
    }
    
}