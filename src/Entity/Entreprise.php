<?php

namespace Application\Entity;

class Entreprise {
    #region Attributs
    private int $id;
    private string $nom;
    private bool $bloque;
    private int $nbEmployes;
    private bool $ouvert;
    private Site $site;
    #endregion

    #region Getters/Setters 
	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getNbEmployes(): int {
		return $this->nbEmployes;
	}
	
	/**
	 * @param int $nbEmployes 
	 * @return self
	 */
	public function setNbEmployes(int $nbEmployes): self {
		$this->nbEmployes = $nbEmployes;
		return $this;
	}
	/**
	 * @return bool
	 */
	public function getOuvert(): bool {
		return $this->ouvert;
	}
	
	/**
	 * @param bool $ouvert 
	 * @return self
	 */
	public function setOuvert(bool $ouvert): self {
		$this->ouvert = $ouvert;
		return $this;
	}
	/**
	 * @return Site
	 */
	public function getSite(): Site {
		return $this->site;
	}
	
	/**
	 * @param Site $site 
	 * @return self
	 */
	public function setSite(Site $site): self {
		$this->site = $site;
		return $this;
	}
	/**
	 * @return bool
	 */
	public function getBloque(): bool {
		return $this->bloque;
	}
	
	/**
	 * @param bool $bloque 
	 * @return self
	 */
	public function setBloque(bool $bloque): self {
		$this->bloque = $bloque;
		return $this;
	}
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
    #endregion
}