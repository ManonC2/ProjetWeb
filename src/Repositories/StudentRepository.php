<?php
namespace Application\Repositories\Student;

require_once('lib/DBconnexion.php');

use Application\Lib\Database\DBConnexion;

class StudentRepository {

    public DBConnexion $connexion;

    public function dbConnect(){
        $statement = $this->connexion->dbConnect()->prepare(
            "Requete SQL"
        );
    }

    //Functions related to Students 
}