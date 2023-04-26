<?php

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/EntrepriseRepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\EmployeRepository;

class EmployeController {

        
    function vacatairesMAToutTemps(){
        $EmployeRepo = new EmployeRepository();
        $EmployeRepo->connexion = new DBConnexion();

        $Employes = $EmployeRepo->getEmployeMaitreVac();

        require('./src/templates/employe/employeMaitreVac.php');
    }

    function vacatairesMACourant(){
        $EmployeRepo = new EmployeRepository();
        $EmployeRepo->connexion = new DBConnexion();

        $Employes = $EmployeRepo->getEmployeMaitreVacCurent();

        require('./src/templates/employe/employeMaitreVacCourant.php');
    }

    function getMA(){
        $EmployeRepo = new EmployeRepository();
        $EmployeRepo->connexion = new DBConnexion();

        $Employes = $EmployeRepo->getEmployeMaitre();

        require('./src/templates/employe/employeMaitre.php');
    }

    function getVacataires(){
        $EmployeRepo = new EmployeRepository();
        $EmployeRepo->connexion = new DBConnexion();

        $Employes = $EmployeRepo->getEmployeVacataire();

        require('./src/templates/employe/employeVac.php');
    }
}