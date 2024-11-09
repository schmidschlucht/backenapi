<?php

namespace Models;

use Core\Database;
use PDO;

class User {
    private PDO $conn;

    public function __construct(Database $database) {
        $this->conn = $database->getConnection();
    }

    public function getAll(): array {
        $sql = "Select * from users";
        $stmt = $this->conn->query($sql);

        $data = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {            
            $data[] = $row;
        }
        return $data;
    }

    public function create(array $data): string {
        $sql = "INSERT INTO persons (first_name, last_name,email, descr, admin)
                VALUES (:first_name, :last_name, :email, :descr, :admin)";
        
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":first_name", $data["first_name"], PDO::PARAM_STR);
        $stmt->bindValue(":last_name", $data["last_name"], PDO::PARAM_STR);
        $stmt->bindValue(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindValue(":descr", $data["descr"], PDO::PARAM_STR);
        $stmt->bindValue(":admin", (bool)$data["admin"] ?? false, PDO::PARAM_BOOL);

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function get(string $id):array {

        $sql= "SELECT * FROM users WHERE user_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update(array $current, array $new): int {
        $sql = "UPDATE product
                SET first_name = :first_name, last_name= :last_name, email = :email, descr = :descr, admin = :admin
                WHERE person_id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":first_name", $new["first_name"] ?? $current["first_name"], PDO::PARAM_STR);
        $stmt->bindValue(":last_name", $new["last_name"] ?? $current["last_name"], PDO::PARAM_STR);
        $stmt->bindValue(":email", $new["email"] ?? $current["email"], PDO::PARAM_STR);
        $stmt->bindValue(":descr", $new["descr"] ?? $current["descr"], PDO::PARAM_STR);
        $stmt->bindValue(":admin", $new["admin"] ?? $current["admin"], PDO::PARAM_BOOL);
        $stmt->bindValue(":id", $current["person_id"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete(int $id): int {

        $sql = "DELETE persons WHERE person_id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
