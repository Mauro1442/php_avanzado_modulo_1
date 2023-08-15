<?php

require_once "connection.php";

class FormModel
{
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
}
