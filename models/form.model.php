<?php

require_once "connection.php";

class FormModel
{

    // insert registered user into database

    static public function mdlSignIn($table, $data)
    {
        $stmt = Connection::connect()->prepare("INSERT INTO $table(name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
            print_r($stmt->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    // select registered user from database

    static public function mdlSelectUser($table, $item, $value)
    {
        if ($item == null && $value == null) {
            $stmt = Connection::connect()->prepare("SELECT *, DATE_FORMAT(created, '%d/%m/%Y') AS created FROM $table ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();

        } else {

            $stmt = Connection::connect()->prepare("SELECT *, DATE_FORMAT(created, '%d/%m/%Y') AS created FROM $table 
            WHERE $item = :$item ORDER BY id DESC");


			$stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch();
            $stmt->closeCursor();
        
        }

        $stmt = null;
    }

    // update registered user into database

    static public function mdlUpdateUser($table, $data)
    {
        $stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    // delete registered user from database

    static public function mdlDeleteUser($table, $data)
    {
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(":id", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

}
?>