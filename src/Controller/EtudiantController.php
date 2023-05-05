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

        $etudiants = $etudiantRepo->getAllAlternants();
        
        require('./src/templates/etudiants/etudiants.php');
    }

    function stagiaires(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiants = $etudiantRepo->getAllStagiaires();

        require('./src/templates/etudiants/etudiants.php');

    }

    function all(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiants = $etudiantRepo->getAllStagiairesEtAlternants();

        require('./src/templates/etudiants/etudiants.php');

    }

    function etudiantsTermines(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();

        $etudiantsTermines = $etudiantRepo->getEtudiantsTermines();

        require('./src/templates/etudiants/etudiantsTermines.php');

    }

    function etudiantsDeuxTermines(){
        $etudiantRepo = new EtudiantRepository();
        $etudiantRepo->connexion = new DBConnexion();
        
        $etudiantsTermines = $etudiantRepo->getEtudiantsDeuxTermines();
        
        require('./src/templates/etudiants/etudiantsDeuxTermines.php');

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
