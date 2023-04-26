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
}