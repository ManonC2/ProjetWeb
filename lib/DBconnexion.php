<?php

namespace Application\Lib\Database;

class DBConnexion {
    public ?\PDO $database = null;

    function dbConnect() : \PDO {
        if($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=ProjetWeb;charset=utf8','root', '');
        }
        return $this->database;
    }
}
