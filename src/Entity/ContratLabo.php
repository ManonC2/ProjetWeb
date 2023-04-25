<?php

namespace Application\Entity;

use DateTime;

class ContratLabo {
    #region Attributs
    private int $id;
    private DateTime $dateDebut;
    private DateTime $dateFin;
    private int $laboratoireId;
    private int $employeId;
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
	public function getEmployeId(): int {
		return $this->employeId;
	}
	
	/**
	 * @param int $employeId 
	 * @return self
	 */
	public function setEmployeId(int $employeId): self {
		$this->employeId = $employeId;
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
	public function getLaboratoireId(): int {
		return $this->laboratoireId;
	}
	
	/**
	 * @param int $laboratoireId 
	 * @return self
	 */
	public function setLaboratoireId(int $laboratoireId): self {
		$this->laboratoireId = $laboratoireId;
		return $this;
	}
    #endregion
}