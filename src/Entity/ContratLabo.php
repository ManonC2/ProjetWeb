<?php

namespace Application\Entity;


use Application\Entity\Employe;

class ContratLabo {
    #region Attributs
    private int $id;
    private string $dateDebut;
    private string $dateFin;
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
     * @return string
     */
	public function getDateDebut(): string {
		return $this->dateDebut;
	}
	
    /**
     * @param string $dateDebut
     * @return self
     */
	public function setDateDebut(string $dateDebut): self {
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
	 * @param Employe $employeId 
	 * @return self
	 */
	public function setEmploye(Employe $employe): self {
		$this->employe = $employe;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDateFin(): string {
		return $this->dateFin;
	}
	
	/**
	 * @param string $dateFin 
	 * @return self
	 */
	public function setDateFin(string $dateFin): self {
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