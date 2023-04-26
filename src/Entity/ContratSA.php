<?php

namespace Application\Entity;

use DateTime;

class ContratSA {
    #region Attributs
    private int $id;
    private DateTime $dateDebut;
    private DateTime $dateFinAnticipee;
    private DateTime $dateFinPrevue;
    private Etudiant $etudiant;
    private Employe $employe;
    private Entreprise $entreprise;
    private Site $site;
    private bool $type;
    private int $noteEntreprise;
    private int $noteMaitreStage;
    #endregion

    #region Getters/Setters 
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
	public function getEtudiant(): Etudiant {
		return $this->etudiant;
	}
	
	/**
	 * @param int $etudiantId 
	 * @return self
	 */
	public function setEtudiant(Etudiant $etudiant): self {
		$this->etudiant = $etudiant;
		return $this;
	}
	/**
	 * @return int
	 */
	public function getEntreprise(): Entreprise {
		return $this->entreprise;
	}
	
	/**
	 * @param int $entreprise 
	 * @return self
	 */
	public function setEntreprise(Entreprise $entreprise): self {
		$this->entreprise = $entreprise;
		return $this;
	}
	/**
	 * @return int
	 */
	public function getSite(): Site {
		return $this->site;
	}
	/**
	 * @param int $siteId 
	 * @return self
	 */
	public function setSiteId(Site $site): self {
		$this->site = $site;
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
	public function getEmploye(): Employe {
		return $this->employe;
	}
	
	/**
	 * @param int $employeId 
	 * @return self
	 */
	public function setEmploye(Employe $employe): self {
		$this->employe = $employe;
		return $this;
	}
    #endregion
}