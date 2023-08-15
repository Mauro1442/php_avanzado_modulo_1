<?php
class Connection
{
    static public function connect()
    {
        $link = new PDO("mysql:host=localhost;port:80;dbname=users_db", "root", "");
        $link->exec("set names utf8");
        return $link;
    }
}
