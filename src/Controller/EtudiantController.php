<?php

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/EtudiantRepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\EtudiantRepository;

class EtudiantController {

        
    function alternants(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $alternants = $etudiantRepo->getAllAlternants();

        require('./src/templates/etudiants/alternants.php');
    }

    function stagiaires(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $stagiaires = $etudiantRepo->getAllStagiaires();

        require('./src/templates/etudiants/stagiaires.php');

    }

    function all(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiants = $etudiantRepo->getAllStagiairesEtAlternants();

        require('./src/templates/etudiants/stagiairesAlternants.php');

    }

    function etudiantsTermines(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiantsTermines = $etudiantRepo->getEtudiantsTermines();

        require('./src/templates/etudiants/etudiantsTermines.php');

    }

    function getQtFinAnticipe(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiantsTermines = $etudiantRepo->QtFinAnticipe();

        require('./src/templates/etudiants/QtFinAnticipe.php');
    }

    function getQtDefaultContratEtuOverflow(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiantsTermines = $etudiantRepo->QtDefaultContratEtuOverflow();

        require('./src/templates/etudiants/QtDefaultContratEtuOverflow.php');
    }
}
