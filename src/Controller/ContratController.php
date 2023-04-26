<?php

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/ContratLaboRepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\ContratRepository;

class ContratController {

    function getNbContratsLabo(){
        $contratLaboRepo = new ContratLaboRepository();
        $contratLaboRepo->connexion = new DBConnexion();

        $ContratsLabo = $contratLaboRepo->ContratsLabo();

        require('./src/templates/contrat/ContratLabo.php');
    }
        
    function getConflits(){
        $contratSARepo = new ContratSARepository();
        $contratLaboRepo->connexion = new DBConnexion();

        $ContratsSA = $contratSARepo->ContratsSAConflit();

        require('./src/templates/contrat/ContratSaConflits.php');
    }

    function getQtDefaultContratLaboOverflow(){
        $contratSARepo = new ContratSARepository();
        $contratLaboRepo->connexion = new DBConnexion();

        $ContratsSA = $contratSARepo->QtDefaultContratLaboOverflow();

        require('./src/templates/contrat/QtDefaultContratLaboOverflow.php');
    }

    
}
