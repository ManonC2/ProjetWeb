<?php 

namespace Application\Controller;

require_once('lib/DBconnexion.php');
require_once('src/Repository/EtudiantRepository.php');

use Application\Lib\Database\DBConnexion;
use Application\Repository\EtudiantRepository;

class BaseController {
    function base() {

        require('./src/templates/homepage.php');
    }
}
