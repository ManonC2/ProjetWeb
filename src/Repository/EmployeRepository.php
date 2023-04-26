<?php
namespace Application\Repository;

use Application\Entity\Entreprise;

require_once('lib/DBconnexion.php');
require_once('src/Entity/Employe.php');

use Application\Lib\Database\DBConnexion;

class EntrepriseRepository {

    #region attributs 
    public DBConnexion $connexion;
    #endregion

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
        return $employe;
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
        return $employe;
    }
}