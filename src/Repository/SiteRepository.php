<?php
namespace Application\Repository;

use Application\Entity\Site;

require_once('lib/DBconnexion.php');
require_once('src/Entity/Site.php');
require_once('src/Entity/Entreprise.php');
require_once('src/Entity/Employe.php');


use Application\Lib\Database\DBConnexion;
use Application\Entity\Employe;
use Application\Entity\Entreprise;

class SiteRepository {
    public DBConnexion $connexion;

    /**
     * @param int $id
     * @return Site
     */
    public function getSiteById(int $id){

        $statement= $this->connexion->dbConnect()->prepare('SELECT id, ville, adresse, pays FROM Site WHERE id = ?');

        $statement->execute([$id]);

        $row = $statement->fetch();

        $site = new Site();
        $site->setId($row['id']);
        $site->setAdresse($row['adresse']);
        $site->setPays($row['pays']);
        $site->setVille($row['ville']);
        
        return $site;
    }
}