<?php
namespace Application\Repository;

use Application\Entity\Entreprise;
use Application\Entity\Employe;

require_once('lib/DBconnexion.php');
require_once('src/Entity/Employe.php');

use Application\Lib\Database\DBConnexion;

class EmployeRepository {

    #region attributs 
    public DBConnexion $connexion;
    #endregion

    /**
     * @param int $id
     * @return Employe
     */
        public function getEmployeById(int $id){

        $statement= $this->connexion->dbConnect()->prepare('SELECT id, nom, entreprise_id FROM Employe WHERE id = ?');

        $statement->execute([$id]);

        $row = $statement->fetch();

        $employe = new Employe();
        $employe->setId($row['id']);
        $employe->setNom($row['nom']);
        $employe->setEntrepriseId($row['entreprise_id']);
        
        return $employe;
    }

    /**
     * @return array
     */
    function getEmployeMaitreVac(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT nom FROM Employe WHERE id in (SELECT employe_id FROM ContratVacataire) and id in (SELECT employe_id FROM ContratSA);"
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employes[] = $employe;
        }
        return $employes;
    }

    function getEmployeMaitreVacCurent(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT nom FROM Employe WHERE id IN (SELECT employe_id FROM ContratVacataire WHERE dateDebut < CURRENT_DATE() and dateFin > CURRENT_DATE()) AND id IN (SELECT employe_id FROM ContratSA WHERE dateDebut < CURRENT_DATE() AND ((dateFinAnticipee IS NULL AND dateFinPrevue > CURRENT_DATE()) OR (dateFinAnticipee > CURRENT_DATE())));"
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employes[] = $employe;
        }
        return $employes;
    }

    function getEmployeMaitre(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Employe.nom AS nom FROM Employe WHERE id IN (SELECT employe_id from ContratSA);"
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employes[] = $employe;
        }
        return $employes;
    }

    function getEmployeVacataire(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Employe.nom AS nom FROM Employe WHERE id IN (SELECT employe_id from ContratVacataire);"
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employes[] = $employe;
        }
        return $employes;
    }

    function getEmployeNote(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT  Employe.nom AS nom, AVG(ContratSA.noteMA) AS noteMOY 
            FROM ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id WHERE ContratSA.noteMA IS NOT NULL 
            GROUP BY Employe.id, Employe.nom,YEAR(ContratSA.dateFinPrevue) 
            ORDER BY YEAR(ContratSA.dateFinPrevue) DESC, Employe.nom ASC;"
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employe->setNoteCumul($row['noteMOY']);
            $employes[] = $employe;
        }
        return $employes;
    }

    function QtDefaultMaOverflow(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Employe.id, Employe.nom 
            FROM ContratSA INNER JOIN Employe ON ContratSA.employe_id=Employe.id 
            GROUP BY Employe.id, Employe.nom 
            HAVING COUNT(ContratSA.etudiant_id)>3; "
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employes[] = $employe;
        }
        return $employes;
    }

    function QtDefaultContratVacaOverflow(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Employe.nom AS nom
            FROM ContratVacataire INNER JOIN Employe ON ContratVacataire.employe_id=Employe.id 
            WHERE dateDebut < CURRENT_DATE() and dateFin > CURRENT_DATE() 
            GROUP BY Employe.id, Employe.nom 
            HAVING COUNT(ContratVacataire.id)>1;"
        );

        $employes=[];

        while(($row = $statement->fetch())){
            $employe = new Employe();
            $employe->setNom($row['nom']);
            $employes[] = $employe;
        }
        return $employes;
    }
}