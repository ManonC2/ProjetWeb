<?php

namespace Application\Entity;

use Application\Entity\Entreprise;
use Application\Entity\Site;

class SiteEntreprise {
    #region Attributs
    private Entreprise $entreprise;
    private Site $site;
    #endregion

    #region Getters/Setters 
    public function getEntreprise():?Entreprise{
        return $this->entreprise;
    }

    public function getSite():?Site{
        return $this->site;
    }

    public function setEntreprise(Entreprise $entreprise):self{
        $this->entreprise = $entreprise;
        return $this;
    }

    public function setSite(Site $site):self{
        $this->site = $site;
        return $this;
    }
    #endregion
}