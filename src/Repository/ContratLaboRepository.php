<?php
namespace Application\Repository;

use Application\Entity\ContratLabo;

require_once('lib/DBconnexion.php');
require_once('src/Entity/ContratLabo.php');
require_once('src/Entity/Entreprise.php');
require_once('src/Entity/Employe.php');


use Application\Lib\Database\DBConnexion;
use Application\Entity\Employe;
use Application\Entity\Entreprise;

class ContratLaboRepository {

    public DBConnexion $connexion;
    /**
     * @return array
     */
    function contratsLabo(){ 
        $statement = $this->connexion->dbConnect()->query(
            "SELECT labo.nom AS laboratoire, Entreprise.nom AS entreprise, Employe.nom AS employe, ContratLabo.dateDebut AS date_debut, ContratLabo.dateFin AS date_fin FROM ((ContratLabo INNER JOIN Entreprise ON ContratLabo.entreprise_id = Entreprise.id) INNER JOIN Entreprise AS labo ON ContratLabo.laboratoire_id=labo.id) INNER JOIN Employe ON ContratLabo.employe_id=Employe.id;"
        );
        $Contrats=[];

        while(($row = $statement->fetch())){
            $contrat = new ContratLabo();
            $entreprise = new Entreprise();
            $laboratoire = new Entreprise();
            $employe = new Employe();

            $laboratoire->setNom($row['laboratoire']);
            $contrat->setLaboratoire($laboratoire);

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

    /**
     * @return array
     */
    function QtDefaultContratLaboOverflow(){ 
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Entreprise.nom AS nomEntreprise, labo.nom AS nomLabo, Employe.nom AS nomEmploye
            FROM (((ContratLabo AS cl1 INNER JOIN ContratLabo AS cl2 on cl1.laboratoire_id=cl2.laboratoire_id) INNER JOIN Entreprise ON cl1.entreprise_id=Entreprise.id)
            INNER JOIN Entreprise AS labo ON cl1.laboratoire_id=labo.id) INNER JOIN Employe ON cl1.employe_id=Employe.id
            WHERE (cl1.dateDebut < CURRENT_DATE() AND cl1.dateFin > CURRENT_DATE()) AND (cl2.dateDebut < CURRENT_DATE() AND cl2.dateFin > CURRENT_DATE()) AND cl1.id != cl2.id AND cl1.employe_id = cl2.employe_id AND cl1.entreprise_id=cl2.entreprise_id;"
        );

        $Contrats=[];

        while(($row = $statement->fetch())){
            $contrat = new ContratLabo();
            $entreprise = new Entreprise();
            $laboratoire = new Entreprise();
            $employe = new Employe();

            $laboratoire->setNom($row['laboratoire']);
            $contrat->setLaboratoire($laboratoire);

            $entreprise->setNom($row['entreprise']);
            $contrat->setEntreprise($entreprise);

            $employe->setNom($row['employe']);
            $contrat->setEmploye($employe);

            $Contrats[] = $contrat;
        }
        return $Contrats;
    }
}