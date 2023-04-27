<?php

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/EntrepriseRepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\EntrepriseRepository;

class EntrepriseController {

        
    function entreprisesBloquees(){
        $entrepriseRepo = new EntrepriseRepository();
        $entrepriseRepo->connexion = new DBConnexion();

        $entreprises = $entrepriseRepo->getEntreprisesBloquees();

        require('./src/templates/entreprises/entreprisesBloquees.php');
    }

    function entrepriseAdresse(){
        $entrepriseRepo = new EntrepriseRepository();
        $entrepriseRepo->connexion = new DBConnexion();

        $entreprises = $entrepriseRepo->getentrepriseAdresse();

        require('./src/templates/entreprises/entreprisesSieges.php');
    }

    function getNombreContrats(){
        $entrepriseRepo = new EntrepriseRepository();
        $entrepriseRepo->connexion = new DBConnexion();

        $entreprises = $entrepriseRepo->NombreContrats();

        require('./src/templates/entreprises/entreprisesNbContrat.php');
    }

    function getQtEntrepriseOverflow(){
        $entrepriseRepo = new EntrepriseRepository();
        $entrepriseRepo->connexion = new DBConnexion();

        $entreprises = $entrepriseRepo->getEntrepriseOverflow();

        require('./src/templates/entreprises/QtEntrepriseOverflow.php');
    }
}
