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
    function getAllAlternants(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT id, nationalite, numeroEtudiant FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE !(type));
            "
        );

        $alternants=[];

        while(($row = $statement->fetch())){
            $alternant = new Etudiant();
            $alternant->setNationalite($row['nationalite']);
            $alternant->setNumeroEtudiant($row['numeroEtudiant']);
            $alternant->setId($row['id']);

            $alternants[] = $alternant;
        }
        return $alternants;
    }

    /**
     * @return array
     */
    function getAllStagiaires(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT id, nationalite, numeroEtudiant FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE type);
            "
        );

        $alternants=[];

        while(($row = $statement->fetch())){
            $alternant = new Etudiant();
            $alternant->setNationalite($row['nationalite']);
            $alternant->setNumeroEtudiant($row['numeroEtudiant']);
            $alternant->setId($row['id']);

            $alternants[] = $alternant;
        }
        return $alternants;
    }


    function getAllStagiairesEtAlternants(){
        $statement = $this->connexion->dbConnect()>query(
            "SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA);"
        );

        $etudiants=[];
        
        while(($row = $statement->fetch())){
            $etdiant = new Etudiant();
            $etudiant->setNationalite($row['nationalite']);
            $etudiant->setNumeroEtudiant($row['numeroEtudiant']);
            $etudiant->setId($row['id']);

            $etudiants[] = $etudiant;
        }
        return $etudiants;
    }


    function getEtudiantsTermines(){
        $statement = $this->connexion->dbConnect()>query(
            "SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA);"
        );

        $etudiants=[];
        
        while(($row = $statement->fetch())){
            $etdiant = new Etudiant();
            $etudiant->setNationalite($row['nationalite']);
            $etudiant->setNumeroEtudiant($row['numeroEtudiant']);
            $etudiant->setId($row['id']);

            $etudiants[] = $etudiant;
        }
        return $etudiants;
    }


    function getEtudiant1(){
        $statement = $this->connexion->dbConnect()->prepare("SELECT id, nationalite, numeroEtudiant FROM Etudiant WHERE id = ?");
        $statement->execute([1]);
        $row = $statement->fetch();

        $etudiant = new Etudiant();
        $etudiant->setId($row['id']);
        $etudiant->setNationalite($row['nationalite']);
        $etudiant->setNumeroEtudiant($row['numeroEtudiant']);

        return $etudiant;
    }

    /**
     * @return array
     */
    function QtFinAnticipe(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT	Etudiant.nationalite AS nationalite, Etudiant.numeroEtudiant AS numeroEtudiant
            FROM (ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id) INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id 
            WHERE ContratSA.dateFinAnticipee IS NOT NULL AND Etudiant.id in (
                SELECT ContratSA.etudiant_id 
                FROM ContratSA 
                WHERE ContratSA.dateFinAnticipee IS NOT NULL 
                GROUP BY ContratSA.etudiant_id 
                HAVING COUNT(ContratSA.id)>2
            );"
        );

        $alternants=[];

        while(($row = $statement->fetch())){
            $alternant = new Etudiant();
            $alternant->setNationalite($row['nationalite']);
            $alternant->setNumeroEtudiant($row['numeroEtudiant']);

            $alternants[] = $alternant;
        }
        return $alternants;
    }

    /**
     * @return array
     */
    function QtDefaultContratEtuOverflow(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Etudiant.nationalite AS nationalite, Etudiant.numeroEtudiant AS numeroEtudiant 
            FROM ContratSA INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id 
            WHERE ContratSA.dateDebut < CURRENT_DATE() AND ((ContratSA.dateFinAnticipee IS NULL AND ContratSA.dateFinPrevue > CURRENT_DATE()) OR (ContratSA.dateFinAnticipee > CURRENT_DATE())) 
            GROUP BY Etudiant.id, Etudiant.numeroEtudiant 
            HAVING COUNT(ContratSA.id)>1;"
        );

        $alternants=[];

        while(($row = $statement->fetch())){
            $alternant = new Etudiant();
            $alternant->setNationalite($row['nationalite']);
            $alternant->setNumeroEtudiant($row['numeroEtudiant']);

            $alternants[] = $alternant;
        }
        return $alternants;
    }
}