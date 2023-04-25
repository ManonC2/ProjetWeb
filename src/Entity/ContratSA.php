<?php

namespace Application\Entity;

use DateTime;

class ContratSA {
    #region Attributs
    private int $id;
    private DateTime $dateDebut;
    private DateTime $dateFinAnticipee;
    private DateTime $dateFinPrevue;
    private int $etudiantId;
    private int $employeId;
    private int $entrepriseId;
    private int $siteId;
    private bool $type;
    private int $noteEntreprise;
    private int $noteMaitreStage;
    #endregion

    #region Getters/Setters 

    #endregion


	/**
	 * @return int
	 */
	public function getId(): int {
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
	 * @return DateTime
	 */
	public function getDateFinAnticipee(): DateTime {
		return $this->dateFinAnticipee;
	}
	
	/**
	 * @param DateTime $dateFinAnticipee 
	 * @return self
	 */
	public function setDateFinAnticipee(DateTime $dateFinAnticipee): self {
		$this->dateFinAnticipee = $dateFinAnticipee;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDateFinPrevue(): DateTime {
		return $this->dateFinPrevue;
	}
	
	/**
	 * @param DateTime $dateFinPrevue 
	 * @return self
	 */
	public function setDateFinPrevue(DateTime $dateFinPrevue): self {
		$this->dateFinPrevue = $dateFinPrevue;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getEtudiantId(): int {
		return $this->etudiantId;
	}
	
	/**
	 * @param int $etudiantId 
	 * @return self
	 */
	public function setEtudiantId(int $etudiantId): self {
		$this->etudiantId = $etudiantId;
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
	public function getSiteId(): int {
		return $this->siteId;
	}
	
	/**
	 * @param int $siteId 
	 * @return self
	 */
	public function setSiteId(int $siteId): self {
		$this->siteId = $siteId;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNoteEntreprise(): int {
		return $this->noteEntreprise;
	}
	
	/**
	 * @param int $noteEntreprise 
	 * @return self
	 */
	public function setNoteEntreprise(int $noteEntreprise): self {
		$this->noteEntreprise = $noteEntreprise;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNoteMaitreStage(): int {
		return $this->noteMaitreStage;
	}
	
	/**
	 * @param int $noteMaitreStage 
	 * @return self
	 */
	public function setNoteMaitreStage(int $noteMaitreStage): self {
		$this->noteMaitreStage = $noteMaitreStage;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getType(): bool {
		return $this->type;
	}
	
	/**
	 * @param bool $type 
	 * @return self
	 */
	public function setType(bool $type): self {
		$this->type = $type;
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
}