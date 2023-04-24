<?php 

namespace Application\Entity;

class Etudiant  {
    #region Attributs
    private int $id;
    private string $numeroEtudiant;
    private string $nationalite;
    #endregion
    
    #region Getters/Setters
    public function getId():?int {
        return $this->id;
    }

    public function getNumeroEtudiant():?string {
        return $this->numeroEtudiant;
    }

    public function getNationalite():?string {
        return $this->nationalite;
    }

    public function setNumeroEtudiant(string $numeroEtudiant):self{
        $this->numeroEtudiant = $numeroEtudiant;
        return $this;
    }

    public function setNationalite(string $nationalite):self{
        $this->nationalite = $nationalite;
        return $this;
    }
    #endregion 
}
?>