<?php

namespace Application\Entity;

class Employe {
    #region Attributs
    private int $id;
    private string $nom;
    private int $entrepriseId;
    #endregion

    #region Getters/Setters 
	/**
	 * @return string
	 */
	public function getNom(): string {
		return $this->nom;
	}
	
	/**
	 * @param string $nom 
	 * @return self
	 */
	public function setNom(string $nom): self {
		$this->nom = $nom;
		return $this;
	}
	/**
	 * @return int
	 */
	public function getEntrepriseId(): int {
		return $this->entrepriseId;
	}
	
	/**
	 * @param int $entrepriseId 
	 * @return self
	 */
	public function setEntrepriseId(int $entrepriseId): self {
		$this->entrepriseId = $entrepriseId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
    #endregion
}