<?php
namespace Application\Repository;

use Application\Entity\ContratLabo;

require_once('lib/DBconnexion.php');
require_once('src/Entity/ContratLabo.php');

use Application\Lib\Database\DBConnexion;

class ContratLaboRepository {

    /**
     * @return array
     */
    function ContratsLabo(){ 
        $statement = $this->connexion->dbConnect()->query(
            "SELECT labo.nom AS laboratoire, Entreprise.nom AS entreprise, Employe.nom AS employe, ContratLabo.dateDebut AS date_debut, ContratLabo.dateFin AS date_fin FROM ((ContratLabo INNER JOIN Entreprise ON ContratLabo.entreprise_id = Entreprise.id) INNER JOIN Entreprise AS labo ON ContratLabo.laboratoire_id=labo.id) INNER JOIN Employe ON ContratLabo.employe_id=Employe.id;"
        );

        $Contrats=[];

        while(($row = $statement->fetch())){
            $contrat = new ContratLabo();
            $entreprise = new Entreprise();
            $laboratoir = new Entreprise();
            $employe = new Employe();

            $laboratoir->setNom($row['laboratoire']);
            $contrat->setLaboratoire($laboratoir);

            $entreprise->setNom($row['entreprise']);
            $contrat->setEntreprise($entreprise);

            $employe->setNom($row['employe']);
            $contrat->setEmploye($employe);

            $contrat->setDateDebut($row['date_debut']);
            $contrat->setDateFin($row['date_fin']);
            $Contrats[] = $contrat;
        }
        return $Contrats;
    }


}