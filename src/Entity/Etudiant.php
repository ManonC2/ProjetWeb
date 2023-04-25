<?php 

namespace Application\Entity;

class Etudiant  {
    #region Attributs
    private int $id;
    private string $numeroEtudiant;
    private string $nationalite;
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
    public function getNumeroEtudiant():?string {
        return $this->numeroEtudiant;
    }

    /**
     * @return string
     */
    public function getNationalite():?string {
        return $this->nationalite;
    }

    /**
     * @param string $numeroEtudiant
     * @return self
     */
    public function setNumeroEtudiant(string $numeroEtudiant):self{
        $this->numeroEtudiant = $numeroEtudiant;
        return $this;
    }

    /**
     * @param string $nationalite
     * @return self
     */
    public function setNationalite(string $nationalite):self{
        $this->nationalite = $nationalite;
        return $this;
    }
    #endregion 
}
