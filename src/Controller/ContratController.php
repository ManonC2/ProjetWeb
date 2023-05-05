<?php

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/ContratLaboRepository.php');
require_once('src/Repository/ContratSARepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\ContratRepository;
use Application\Repository\ContratSARepository;
use Application\Repository\ContratLaboRepository;

class ContratController {

    public DBConnexion $connexion;

    function getNbContratsLabo(){
        $contratLaboRepo = new ContratLaboRepository();
        $contratLaboRepo->connexion = new DBConnexion();
        
        $contratsLabo = $contratLaboRepo->contratsLabo();

        require('./src/templates/contrat/ContratLabo.php');
    }
        
    function getConflits(){
        $contratSARepo = new ContratSARepository();
        $contratSARepo->connexion = new DBConnexion();

        $ContratsSA = $contratSARepo->ContratsSAConflit();

        require('./src/templates/contrat/conflits.php');
    }

    function getQtDefaultContratLaboOverflow(){
        $contratSARepo = new ContratLaboRepository();
        $contratSARepo->connexion = new DBConnexion();

        $ContratsSA = $contratSARepo->QtDefaultContratLaboOverflow();

        require('./src/templates/contrat/QtDefaultContratLaboOverflow.php');
    }

    
}
