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
    public function getId():?int {
        return $this->id;
    }

    public function getAdresse():?string {
        return $this->adresse;
    }

    public function getVille():?string{
        return $this->ville;
    }

    public function getPays():?string{
        return $this->pays;
    }

    public function setAdresse(string $adresse):self{
        $this->adresse = $adresse;
        return $this;
    }
    public function setVille(string $ville):self{
        $this->ville = $ville;
        return $this;
    }
    public function setPays(string $pays):self{
        $this->pays = $pays;
        return $this;
    }

    #endregion
}