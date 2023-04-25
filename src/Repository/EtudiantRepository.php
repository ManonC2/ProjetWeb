<?php
namespace Application\Repository;

use Application\Entity\Etudiant;

require_once('lib/DBconnexion.php');
require_once('src/Entity/Etudiant.php');

use Application\Lib\Database\DBConnexion;

class EtudiantRepository {

    #region attributs 
    public DBConnexion $connexion;
    #endregion

    /**
     * @return array
     */
    function getAllEtudiants(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT * FROM Etudiant"
        );
        $etudiants=[];

        while(($row = $statement->fetch())){
            $etudiant = new Etudiant();
            $etudiant->setNationalite($row['nationalite']);
            $etudiant->setNumeroEtudiant($row['numeroEtudiant']);
            $etudiant->setId($row['id']);

            $etudiants[] = $etudiant;
        }
        return $etudiants;
    }

    /**
     * @return Etudiant
     */
    function getEtudiant1(){
        // $statement = $this->connexion->dbConnect()->prepare("SELECT * FROM Etudiant WHERE id = ?");
        // $statement->execute([1]);
        // $row = $statement->fetch();

        $etudiant = new Etudiant();
        $etudiant->setId(1);
        $etudiant->setNationalite("Fr");
        $etudiant->setNumeroEtudiant("1");

        return $etudiant;
    }
}