<?php
namespace Application\Repository;

use Application\Entity\ContratSA;

require_once('lib/DBconnexion.php');
require_once('src/Entity/ContratSA.php');

use Application\Lib\Database\DBConnexion;

class ContratLaboRepository {

    /**
     * @return array
     */
    function ContratsSAConflit(){ 
        $statement = $this->connexion->dbConnect()->query(
            "SELECT ContratSA.type as t, YEAR(ContratSA.dateFinAnticipee) AS annee, Entreprise.nom as entreprise
            FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id 
            WHERE ContratSA.dateFinAnticipee IS NOT NULL 
            ORDER BY Entreprise.nom,ContratSA.dateFinAnticipee;"
        );

        $Contrats=[];

        while(($row = $statement->fetch())){
            $contrat = new ContratSA();
            $entreprise = new Entreprise();

            $entreprise->setNom($row['entreprise']);
            $contrat->setEntreprise($entreprise);

            $contrat->setDateFinAnticipe($row['annee']);
            $contrat->setType($row['t']);
            $Contrats[] = $contrat;
        }
        return $Contrats;
    }


}