CREATE TABLE
    `Etudiant` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `numeroEtudiant` varchar(255),
        `nationalite` varchar(255)
    );

CREATE TABLE
    `Entreprise` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `nom` varchar(255),
        `bloque` boolean,
        `nbEmployes` integer,
        `ouvert` boolean,
        `siege` varchar(255)
    );

CREATE TABLE
    `Site` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `adresse` varchar(255),
        `ville` varchar(255),
        `pays` varchar(255)
    );

CREATE TABLE
    `Donation` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `valeur` integer,
        `annee` date,
        `entreprise_id` int
    );

CREATE TABLE
    `ContratSA` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `dateDebut` date,
        `dateFinPrevue` date,
        `dateFinAnticipee` date,
        `etudiant_id` varchar(255),
        `employe_id` varchar(255),
        `site_id` int,
        `type` boolean,
        `noteEntr` int,
        `noteMA` int
    );

CREATE TABLE
    `Employe` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `nom` varchar(255),
        `entreprise_id` int
    );

CREATE TABLE
    `SiteEntreprise` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `site_id` int,
        `entreprise_id` int
    );

CREATE TABLE
    `ContratVacataire` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `dateDebut` date,
        `dateFin` date,
        `employe_id` int,
        `note` int
    );

CREATE TABLE
    `ContratLabo` (
        `id` int PRIMARY KEY AUTO_INCREMENT,
        `dateDebut` date,
        `dateFin` date,
        `entreprise_id` int,
        `laboratoire_id` int,
        `employe_id` int,
        `note` int
    );

ALTER TABLE `Etudiant`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratSA` (`etudiant_id`);

ALTER TABLE `Employe`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratSA` (`employe_id`);

ALTER TABLE `Entreprise`
ADD
    FOREIGN KEY (`id`) REFERENCES `SiteEntreprise` (`entreprise_id`);

ALTER TABLE `Site`
ADD
    FOREIGN KEY (`id`) REFERENCES `SiteEntreprise` (`site_id`);

ALTER TABLE `Site`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratSA` (`site_id`);

ALTER TABLE `Employe`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratLabo` (`employe_id`);

ALTER TABLE `Entreprise`
ADD
    FOREIGN KEY (`siege`) REFERENCES `Site` (`adresse`);

ALTER TABLE `Entreprise`
ADD
    FOREIGN KEY (`id`) REFERENCES `Donation` (`entreprise_id`);

ALTER TABLE `Employe`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratVacataire` (`employe_id`);

ALTER TABLE `Entreprise`
ADD
    FOREIGN KEY (`nom`) REFERENCES `ContratLabo` (`entreprise_id`);

ALTER TABLE `Employe`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratLabo` (`id`);

ALTER TABLE `Entreprise`
ADD
    FOREIGN KEY (`id`) REFERENCES `Employe` (`entreprise_id`);

ALTER TABLE `Entreprise`
ADD
    FOREIGN KEY (`id`) REFERENCES `ContratLabo` (`laboratoire_id`);