<?php

namespace Models;


use Core\Model;
use Core\RequestMessage;

class User extends Model {    

    public function __construct(string $table) {
        $this->table = $table;
    }

    public function users(): RequestMessage {
        return $this->findAll();
    }
    
    // public function createTable(): bool{
    //     $sql = 'CREATE TABLE IF NOT EXISTS `users` (
    //         `user_id` int(11) NOT NULL,
    //         `user_firstname` varchar(120) NOT NULL,
    //         `user_lastname` varchar(120) NOT NULL,
    //         `user_email` varchar(120) NOT NULL,
    //         `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
    //         `created_at` timestamp NOT NULL DEFAULT current_timestamp()
    //       )';

    //     $stmt = $this->conn->prepare($sql);
    //     return $stmt->execute();          
    // }

    // public function create(array $data): string {
    //     $sql = "INSERT INTO users(user_firstname, user_firstname, user_email)
    //             VALUES (:user_firstname, :user_lastname, :user_email)";
        
    //     $stmt = $this->conn->prepare($sql);

    //     $stmt->bindValue(":user_firstname", $data["user_firstname"], PDO::PARAM_STR);
    //     $stmt->bindValue(":user_lastname", $data["user_lastname"], PDO::PARAM_STR);
    //     $stmt->bindValue(":user_email", $data["user_email"], PDO::PARAM_STR);
      

    //     $stmt->execute();

    //     return $this->conn->lastInsertId();
    // }

    // public function get(string $id):array {

    //     $sql= "SELECT * FROM users WHERE user_id = :id";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    // public function update(array $current, array $new): int {
    //     $sql = "UPDATE users
    //             SET user_firstname = :user_firstname, 
    //             user_lastname= :user_lastname, 
    //             user_email = :user_email,
    //             updated_at = NOW()
    //             WHERE user_id = :user_id";
    //     $stmt = $this->conn->prepare($sql);

    //     $stmt->bindValue(":user_firstname", $new["user_firstname"] ?? $current["user_firstname"], PDO::PARAM_STR);
    //     $stmt->bindValue(":user_lastname", $new["user_lastname"] ?? $current["user_lastname"], PDO::PARAM_STR);
    //     $stmt->bindValue(":user_email", $new["user_email"] ?? $current["user_email"], PDO::PARAM_STR);
        
        
    //     $stmt->execute();

    //     return $stmt->rowCount();
    // }

    // public function delete(int $id): int {

    //     $sql = "DELETE users WHERE user_id = :id";
    //     $stmt = $this->conn->prepare($sql);

    //     $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    //     $stmt->execute();

    //     return $stmt->rowCount();
    // }
}
