<?php
namespace Application\Repository;

use Application\Entity\Entreprise;

require_once('lib/DBconnexion.php');
require_once('src/Entity/Entreprise.php');

use Application\Lib\Database\DBConnexion;

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
        $statement = $this->connexion->dbConnect()->query(
            "SELECT Entreprise.nom AS nom, Site.adresse AS adresse 
            FROM Entreprise INNER JOIN Site on Entreprise.siege = Site.id;"
        );

        $entreprises=[];

        while(($row = $statement->fetch())){
            $entreprise = new Entreprise();
            $site = new Site();

            $site->setAdresse($row['adresse']);
            $entreprise->setSite($site);

            $entreprise->setNom($row['nom']);
            $entreprises[] = $entreprise;
        }
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