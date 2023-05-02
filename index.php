<?php
require_once('src/Controller/BaseController.php');
require_once('src/Controller/EtudiantController.php');
require_once('src/Controller/EntrepriseController.php');
require_once('src/Controller/EmployeController.php');
require_once('src/Controller/ContratController.php');

use Application\Controller\BaseController;
use Application\Controller\EtudiantController;
use Application\Controller\EntrepriseController;
use Application\Controller\EmployeController;
use Application\Controller\ContratController;

try {
    if(isset($_GET['action']) && $_GET['action'] !== ''){
        switch($_GET['action']) {
            case '1':
                (new EntrepriseController)->entrepriseAdresse();
                break;
            case '2':
                (new EntrepriseController)->entreprisesBloquees();
                break;
            case '3':
                (new EmployeController)->vacatairesMAToutTemps();
                break;
            case '4':
                (new EmployeController)->vacatairesMACourant();
                break;
            case '5':
                // (new ContratController)->nombreContrats();
                break;
            case '6':
                (new ContratController)->getNbContratsLabo();
                break;
            case '7':
                (new EmployeController)->getMA();
                break;
            case '8':
                (new EmployeController)->getVacataires();
                break;
            case '9':
                (new EtudiantController)->alternants();
                break;
            case '10':
                (new EtudiantController)->stagiaires();
                break;
            case '11':
                (new EtudiantController)->all();
                break;
            case '12':
                (new ContratController)->getConflits();
                break;
            case '13':
                // (new ContratController)->getTermines();
                break;
            case '14':
                (new EtudiantController)->etudiantsTermines();
                break;
            case '15':
                // (new EtudiantController)->etudiantsDeuxTermines();
                break;
            case '16':
                (new EmployeController)->getMANote();
                break;
            case '17':
                (new ContratController)->getQtDefaultContratLaboOverflow();
                break;
        }
    }else {
            (new BaseController)->base();
        }
} catch(Exception $e) {
    $errorMessage = $e->getMessage();
}