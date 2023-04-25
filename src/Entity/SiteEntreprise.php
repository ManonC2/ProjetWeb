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
    /**
     * @return Entreprise
     */
    public function getEntreprise():?Entreprise{
        return $this->entreprise;
    }

    /**
     * @return Site
     */
    public function getSite():?Site{
        return $this->site;
    }

    /**
     * @param Entreprise $entreprise
     * @return self
     */
    public function setEntreprise(Entreprise $entreprise):self{
        $this->entreprise = $entreprise;
        return $this;
    }

    /**
     * @param Site $site
     * @return self
     */
    public function setSite(Site $site):self{
        $this->site = $site;
        return $this;
    }
    #endregion
}