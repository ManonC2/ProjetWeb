<?php

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/EntrepriseRepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\EmployeRepository;

class EmployeController {

        
    function EmployeMaitreVac(){
        $EmployeRepo = new EmployeRepository();
        $EmployeRepo->connexion = new DBConnexion();

        $Employes = $EmployeRepo->getEmployeMaitreVac();

        require('./src/templates/employe/employeMaitreVac.php');
    }

    function EmployeMaitreVacCurent(){
        $EmployeRepo = new EmployeRepository();
        $EmployeRepo->connexion = new DBConnexion();

        $Employes = $EmployeRepo->getEmployeMaitreVacCurent();

        require('./src/templates/employe/employeMaitreVac.php');
    }
}