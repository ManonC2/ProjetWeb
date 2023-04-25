<?php

namespace Application\Entity;

class Site {
    #region Attributs
    private int $id;
    private string $adresse;
    private string $ville;
    private string $pays;
    #endregion

    #region Getters/Setters 

    /**
     * @return int
     */
    public function getId():?int {
        return $this->id;
    }

    /**
     * @return string 
     */
    public function getAdresse():?string {
        return $this->adresse;
    }

    /**
     * @return string 
     */
    public function getVille():?string{
        return $this->ville;
    }

    /**
     * @return string 
     */
    public function getPays():?string{
        return $this->pays;
    }

    /**
     * @param string $adresse
     * @return self
     */
    public function setAdresse(string $adresse):self{
        $this->adresse = $adresse;
        return $this;
    }
    /**
     * @param string $ville
     * @return self
     */
    public function setVille(string $ville):self{
        $this->ville = $ville;
        return $this;
    }

    /**
     * @param string $pays
     * @return self
     */
    public function setPays(string $pays):self{
        $this->pays = $pays;
        return $this;
    }

    #endregion
}