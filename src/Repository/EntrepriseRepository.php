<?php
namespace Application\Repository;

use Application\Entity\Entreprise;
use Application\Entity\Site;
use Application\Repository\SiteRepository;
use Application\Lib\Database\DBConnexion;

require_once('src/Repository/SiteRepository.php');
require_once('lib/DBconnexion.php');
require_once('src/Entity/Entreprise.php');
require_once('src/Entity/Site.php');


class EntrepriseRepository {

    #region attributs 
    public DBConnexion $connexion;
    #endregion

    /**
     * @return array
     */
    function getEntreprisesBloquees(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT nom from Entreprise WHERE Entreprise.bloque;"
        );

        $entreprises=[];

        while(($row = $statement->fetch())){
            $entreprise = new Entreprise();
            $entreprise->setNom($row['nom']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }

    function getentrepriseAdresse(){
        $siteRepo = new SiteRepository();
        $siteRepo->connexion = new DBConnexion();
        $statement = $this->connexion->dbConnect()->query(
            "SELECT nom, siege FROM Entreprise"
        );

        $entreprises=[];

        while(($row = $statement->fetch())){
            $entreprise = new Entreprise();
            $site = new Site();

            $entreprise->setSiege($siteRepo->getSiteById($row['siege']));

            $entreprise->setNom($row['nom']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }

    function Termines(){
        $siteRepo = new SiteRepository();
        $siteRepo->connexion = new DBConnexion();
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Entreprise.nom AS nom,COUNT(ContratSA.noteEntr) AS nb,MIN(ContratSA.noteEntr) AS min,AVG(ContratSA.noteEntr) AS moy,MAX(ContratSA.noteEntr) AS max 
            FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id 
            WHERE (ContratSA.dateFinAnticipee IS NULL and ContratSA.dateFinPrevue < CURRENT_DATE()) OR ContratSA.dateFinAnticipee < CURRENT_DATE() 
            GROUP BY Entreprise.nom;"
        );

        $entreprises=[];

        while(($row = $statement->fetch())){
            $entreprise = [];

            $entreprise['nom'] = $row['nom'];
            $entreprise['nb'] = $row['nb'];
            $entreprise['min'] = $row['min'];
            $entreprise['moy'] = $row['moy'];
            $entreprise['max'] = $row['max'];
            echo 'test';
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }

    function NombreContrats(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT stage.nom AS nom, nbStage, nbAlternance, nbContratVacataire, nbContratLabo, nbDonation
            FROM (SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbStage FROM Entreprise LEFT JOIN(SELECT ContratSA.entreprise_id, COUNT(*) as nb FROM ContratSA WHERE type GROUP BY ContratSA.entreprise_id) csa ON Entreprise.id = csa.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) stage
            INNER JOIN
            (SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbAlternance FROM Entreprise LEFT JOIN (SELECT ContratSA.entreprise_id, COUNT(*) as nb FROM ContratSA WHERE NOT type GROUP BY ContratSA.entreprise_id) csa ON Entreprise.id = csa.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) alternance ON stage.id=alternance.id
            INNER JOIN
            (SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbContratVacataire FROM Entreprise LEFT JOIN (SELECT ContratVacataire.entreprise_id, COUNT(*) as nb FROM ContratVacataire GROUP BY ContratVacataire.entreprise_id) cv ON Entreprise.id=cv.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) contratV ON stage.id=contratV.id
            INNER JOIN
            (SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbContratLabo FROM Entreprise LEFT JOIN (SELECT ContratLabo.entreprise_id, COUNT(*) as nb FROM ContratLabo GROUP BY ContratLabo.entreprise_id) cl ON Entreprise.id=cl.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) contratL ON stage.id=contratL.id
            INNER JOIN
            (SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbDonation FROM Entreprise LEFT JOIN (SELECT Donation.entreprise_id, COUNT(*) as nb FROM Donation GROUP BY Donation.entreprise_id) d ON Entreprise.id=d.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) Dona ON stage.id=Dona.id;"
        );

        $entreprises=[];
        $nbStage=0;
        $nbAlternance=0;
        $nbContratVacataire=0;
        $nbContratLabo=0;
        $nbDonation=0;

        while(($row = $statement->fetch())){
            $entreprise = [];

            $entreprise['nom'] = $row['nom'];
            $entreprise['nbStage'] = $row['nbStage'];
            $entreprise['nbAlternance'] = $row['nbAlternance'];
            $entreprise['nbContratVacataire'] = $row['nbContratVacataire'];
            $entreprise['nbContratLabo'] = $row['nbContratLabo'];
            $entreprise['nbDonation'] = $row['nbDonation'];

            $nbStage = $nbStage + $row['nbStage'];
            $nbAlternance = $nbAlternance + $row['nbAlternance'];
            $nbContratVacataire = $nbContratVacataire + $row['nbContratVacataire'];
            $nbContratLabo = $nbContratLabo + $row['nbContratLabo'];
            $nbDonation = $nbDonation + $row['nbDonation'];

            $entreprises[] = $entreprise;
        }
        $entreprise = [];
        $entreprise['nom'] = 'Totale';
        $entreprise['nbStage'] = $nbStage;
        $entreprise['nbAlternance'] = $nbAlternance;
        $entreprise['nbContratVacataire'] = $nbContratVacataire;
        $entreprise['nbContratLabo'] = $nbContratLabo;
        $entreprise['nbDonation'] = $nbDonation;

        $entreprises[] = $entreprise;
        
        return $entreprises;
    }

    function getEntrepriseOverflow(){
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Entreprise.nom AS nom
            FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id 
            GROUP BY Entreprise.id,Entreprise.nom 
            HAVING (COUNT(ContratSA.etudiant_id) / SUM(Entreprise.nbEmployes)) > 0.15 AND COUNT(ContratSA.etudiant_id) > 3;"
        );

        $entreprises=[];

        while(($row = $statement->fetch())){
            $entreprise = new Entreprise();
            $entreprise->setNom($row['nom']);
            $entreprises[] = $entreprise;
        }
        return $entreprises;
    }
}