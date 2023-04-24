DROP TABLE IF EXISTS `ContratLabo`;
DROP TABLE IF EXISTS `ContratVacataire`;
DROP TABLE IF EXISTS `SiteEntreprise`;
DROP TABLE IF EXISTS `ContratSA`;
DROP TABLE IF EXISTS `Employe`;
DROP TABLE IF EXISTS `Donation`;
DROP TABLE IF EXISTS `Site`;
DROP TABLE IF EXISTS `Entreprise`;
DROP TABLE IF EXISTS `Etudiant`;

CREATE TABLE
    `Etudiant` (
        `id` int AUTO_INCREMENT,
        `numeroEtudiant` varchar(255),
        `nationalite` varchar(255),
        CONSTRAINT `etudiant_pk` PRIMARY KEY (`id`)
    );

CREATE TABLE
    `Entreprise` (
        `id` int AUTO_INCREMENT,
        `nom` varchar(255),
        `bloque` boolean,
        `nbEmployes` integer,
        `ouvert` boolean,
        `siege` varchar(255),
        CONSTRAINT `entreprise_pk` PRIMARY KEY (`id`)
    );

CREATE TABLE
    `Site` (
        `id` int AUTO_INCREMENT,
        `adresse` varchar(255),
        `ville` varchar(255),
        `pays` varchar(255),
        CONSTRAINT `site_pk` PRIMARY KEY (`id`)
    );

CREATE TABLE
    `Donation` (
        `id` int AUTO_INCREMENT,
        `valeur` integer,
        `annee` date,
        `entreprise_id` int,
        CONSTRAINT `donation_pk` PRIMARY KEY (`id`),
        CONSTRAINT `donation_fk_entreprise` FOREIGN KEY (`entreprise_id`) REFERENCES `Entreprise` (`id`)
    );

CREATE TABLE
    `Employe` (
        `id` int AUTO_INCREMENT,
        `nom` varchar(255),
        `entreprise_id` int,
        CONSTRAINT `employe_pk` PRIMARY KEY (`id`),
        CONSTRAINT `employe_fk_entrprise` FOREIGN KEY (`entreprise_id`) REFERENCES `Entreprise` (`id`)
    );

CREATE TABLE
    `ContratSA` (
        `id` int AUTO_INCREMENT,
        `dateDebut` date,
        `dateFinPrevue` date,
        `dateFinAnticipee` date,
        `etudiant_id` int,
        `employe_id` int,
        `site_id` int,
        `type` boolean,
        `noteEntr` int,
        `noteMA` int,
        CONSTRAINT `contratsa_pk` PRIMARY KEY (`id`),
        CONSTRAINT `contratsa_fk_etudiant` FOREIGN KEY (`etudiant_id`) REFERENCES `Etudiant` (`id`),
        CONSTRAINT `contratsa_fk_employe` FOREIGN KEY (`employe_id`) REFERENCES `Employe` (`id`),
        CONSTRAINT `contratsa_fk_site` FOREIGN KEY (`site_id`) REFERENCES `Site` (`id`)
    );

CREATE TABLE
    `SiteEntreprise` (
        `site_id` int,
        `entreprise_id` int,
        CONSTRAINT `siteentreprise_pk` PRIMARY KEY (`site_id`,`entreprise_id`),
        CONSTRAINT `siteentreprise_fk_entreprise` FOREIGN KEY (`entreprise_id`) REFERENCES `Entreprise` (`id`),
        CONSTRAINT `siteentreprise_fk_site` FOREIGN KEY (`site_id`) REFERENCES `Site` (`id`)
    );

CREATE TABLE
    `ContratVacataire` (
        `id` int AUTO_INCREMENT,
        `dateDebut` date,
        `dateFin` date,
        `employe_id` int,
        `note` int,
        CONSTRAINT `contratvacataire_pk` PRIMARY KEY (`id`),
        CONSTRAINT `contratvacataire_fk_employe` FOREIGN KEY (`employe_id`) REFERENCES `Employe` (`id`)
    );

CREATE TABLE
    `ContratLabo` (
        `id` int AUTO_INCREMENT,
        `dateDebut` date,
        `dateFin` date,
        `laboratoire_id` int,
        `employe_id` int,
        `note` int,
        CONSTRAINT `contratlabo_pk` PRIMARY KEY (`id`),
        CONSTRAINT `contratlabo_fk_entreprise` FOREIGN KEY (`laboratoire_id`) REFERENCES `Entreprise` (`id`),
        CONSTRAINT `contratlabo_fk_employe` FOREIGN KEY (`employe_id`) REFERENCES `Employe` (`id`)
    );
