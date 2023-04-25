<?php

namespace Application\Entity;

use DateTime;

class Donation {
    #region Attributs
    private int $id;
    private int $valeur;
    private DateTime $annee;
    private int $entrepriseId;
    #endregion

    #region Getters/Setters 
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

	/**
	 * @return DateTime
	 */
	public function getAnnee(): DateTime {
		return $this->annee;
	}
	
	/**
	 * @param DateTime $annee 
	 * @return self
	 */
	public function setAnnee(DateTime $annee): self {
		$this->annee = $annee;
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
	public function getValeur(): int {
		return $this->valeur;
	}
	
	/**
	 * @param int $valeur 
	 * @return self
	 */
	public function setValeur(int $valeur): self {
		$this->valeur = $valeur;
		return $this;
	}
    #endregion
}