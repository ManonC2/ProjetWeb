<?php

namespace Application\Entity;

use DateTime;

class ContratLabo {
    #region Attributs
    private int $id;
    private DateTime $dateDebut;
    private DateTime $dateFin;
    private Entreprise $laboratoire;
    private Employe $employe;
	private Entreprise $entreprise;
    private int $note;
    
    #endregion

    #region Getters/Setters 
    /**
     * @return int
     */
    public function getId():?int{
        return $this->id;
    }

    /**
     * @return DateTime
     */
	public function getDateDebut(): DateTime {
		return $this->dateDebut;
	}
	
    /**
     * @param DateTime $dateDebut
     * @return self
     */
	public function setDateDebut(DateTime $dateDebut): self {
		$this->dateDebut = $dateDebut;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNote(): int {
		return $this->note;
	}
	
	/**
	 * @param int $note 
	 * @return self
	 */
	public function setNote(int $note): self {
		$this->note = $note;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getEmploye(): Employe {
		return $this->employe;
	}
	
	/**
	 * @param int $employeId 
	 * @return self
	 */
	public function setEmploye(Employe $employeId): self {
		$this->employe = $employe;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDateFin(): DateTime {
		return $this->dateFin;
	}
	
	/**
	 * @param DateTime $dateFin 
	 * @return self
	 */
	public function setDateFin(DateTime $dateFin): self {
		$this->dateFin = $dateFin;
		return $this;
    }

    	/**
	 * @return int
	 */
	public function getLaboratoire(): Entreprise {
		return $this->laboratoire;
	}
	
	/**
	 * @param int $laboratoireId 
	 * @return self
	 */
	public function setLaboratoire(Entreprise $laboratoire): self {
		$this->laboratoire = $laboratoire;
		return $this;
	}

		/**
	 * @return int
	 */
	public function getEntreprise(): Entreprise {
		return $this->entreprise;
	}
	
	/**
	 * @param int $laboratoireId 
	 * @return self
	 */
	public function setEntreprise(Entreprise $entreprise): self {
		$this->entreprise = $entreprise;
		return $this;
	}
    #endregion
}