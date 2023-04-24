<?php 

namespace Application\Entity;

class Etudiant  {
    public int $id;
    public string $numeroEtudiant;
    public string $nationalite;

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