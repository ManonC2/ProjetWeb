DROP TABLE IF EXISTS `ContratLabo`;
DROP TABLE IF EXISTS `ContratVacataire`;
DROP TABLE IF EXISTS `SiteEntreprise`;
DROP TABLE IF EXISTS `ContratSA`;
DROP TABLE IF EXISTS `Employe`;
DROP TABLE IF EXISTS `Donation`;
DROP TABLE IF EXISTS `Entreprise`;
DROP TABLE IF EXISTS `Site`;
DROP TABLE IF EXISTS `Etudiant`;

CREATE TABLE
    `Etudiant` (
        `id` int AUTO_INCREMENT,
        `numeroEtudiant` varchar(255),
        `nationalite` varchar(255),
        CONSTRAINT `etudiant_pk` PRIMARY KEY (`id`)
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
    `Entreprise` (
        `id` int AUTO_INCREMENT,
        `nom` varchar(255),
        `bloque` boolean,
        `nbEmployes` integer,
        `ouvert` boolean,
        `siege` int,
        CONSTRAINT `entreprise_pk` PRIMARY KEY (`id`),
        CONSTRAINT `entreprise_fk_site` FOREIGN KEY (`siege`) REFERENCES `Site`(`id`)
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
        `entreprise_id` int,
        `site_id` int,
        `type` boolean,
        `noteEntr` int,
        `noteMA` int,
        CONSTRAINT `contratsa_pk` PRIMARY KEY (`id`),
        CONSTRAINT `contratsa_fk_etudiant` FOREIGN KEY (`etudiant_id`) REFERENCES `Etudiant` (`id`),
        CONSTRAINT `contratsa_fk_employe` FOREIGN KEY (`employe_id`) REFERENCES `Employe` (`id`),
        CONSTRAINT `contratsa_fk_entreprise` FOREIGN KEY (`entreprise_id`) REFERENCES `Entreprise`(`id`),
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
        `entreprise_id` int,
        `note` int,
        CONSTRAINT `contratvacataire_pk` PRIMARY KEY (`id`),
        CONSTRAINT `contratvacataire_fk_employe` FOREIGN KEY (`employe_id`) REFERENCES `Employe` (`id`),
        CONSTRAINT `contratvacataire_fk_entreprise` FOREIGN KEY (`entreprise_id`) REFERENCES `Entreprise`(`id`)
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

INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','001');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Allemand','002');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','003');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Anglais','004');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','005');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Anglais','006');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Espagnole','007');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Belge','008');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','009');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Belge','010');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Allemand','011');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Algerien','012');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','013');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Suisse','014');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','015');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Algerien','016');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','017');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Breton','018');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Francais','019');
INSERT INTO Etudiant (nationalite,numeroEtudiant) VALUES ('Breton','020');

INSERT INTO Site (adresse,pays,ville) VALUES ('Rue des Genévriers','France','Paris');
INSERT INTO Site (adresse,pays,ville) VALUES ('Voie des Merchands','France','Paris');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue de Lumière','France','Paris');
INSERT INTO Site (adresse,pays,ville) VALUES ('Voie d\'Ébène','France','Paris');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue de la Baie','France','Bordeaux');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue des Plumes','France','Bordeaux');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue de la Fontaine','France','Lille');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue des Guildes','France','Lille');
INSERT INTO Site (adresse,pays,ville) VALUES ('Route des Ormes','France','Lille');
INSERT INTO Site (adresse,pays,ville) VALUES ('Route de Répit','France','Toulouse');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue du Soleil','France','Carcasonne');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue du Congrès','France','Caen');
INSERT INTO Site (adresse,pays,ville) VALUES ('Route des Bardes','Allemagne','');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue du Cœur','Allemagne','');
INSERT INTO Site (adresse,pays,ville) VALUES ('Chemin du Cyprès','Allemagne','Berlin');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue de Collège','Allemagne','Munich');
INSERT INTO Site (adresse,pays,ville) VALUES ('Boulevard du Palmier','Espagne','Barcelone');
INSERT INTO Site (adresse,pays,ville) VALUES ('Route de la Colline','Espagne','Barcelone');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue des Noyers','Espagne','Barcelone');
INSERT INTO Site (adresse,pays,ville) VALUES ('Boulevard du Monument','Espagne','Barcelone');
INSERT INTO Site (adresse,pays,ville) VALUES ('Chemin d\'Héritage','Belgique','');
INSERT INTO Site (adresse,pays,ville) VALUES ('Boulevard du Lac','Belgique','');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue de Lumière des Étoiles','Belgique','');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue du Duc','Espagne','Madrid');
INSERT INTO Site (adresse,pays,ville) VALUES ('Chemin de Givre','Espagne','Venise');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue du Pré','Espagne','Seville');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue des Épicéas','Espagne','Florence');
INSERT INTO Site (adresse,pays,ville) VALUES ('Boulevard de Cendre','Espagne','Milan');
INSERT INTO Site (adresse,pays,ville) VALUES ('Chemin d\'Innovation','Bretagne','Lannion');
INSERT INTO Site (adresse,pays,ville) VALUES ('Rue d\'Eau','Bretagne','Lorient');

INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('The Test Suite',5,524,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('SMS Laboratory',3,1035,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('i5 Computer Products',15,3,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Koronis Electronics',7,461,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Weld Tech F',9,41,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Geek Kid Computers',17,52,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Ion Tech I',25,34,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Compo Tech Computers',20,1,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Comprehensive LPI',13,103,true,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('MacNeil Computers',6,54,true,true);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('IT Consulting Rep',7,30,true,true);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('EasyPro Logic',4,11,true,true);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Cp Computershop',1,47,true,true);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Turbolinks Group E',14,42,false,true);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Geographic Computing',10,12,false,false);
INSERT INTO Entreprise(nom,siege,nbEmployes,ouvert,bloque) VALUES ('Logizitac Tech',2,123,true,false);

INSERT INTO Donation(entreprise_id,valeur,annee) VALUES (5,4,'2020-03-21');
INSERT INTO Donation(entreprise_id,valeur,annee) VALUES (3,1000,'2020-04-14');
INSERT INTO Donation(entreprise_id,valeur,annee) VALUES (14,200,'2021-05-12');
INSERT INTO Donation(entreprise_id,valeur,annee) VALUES (2,300,'2021-11-14');
INSERT INTO Donation(entreprise_id,valeur,annee) VALUES (16,100,'2022-02-02');
INSERT INTO Donation(entreprise_id,valeur,annee) VALUES (1,50,'2023-02-04');

INSERT INTO Employe(nom,entreprise_id) VALUES ('Roseline Fournier',1);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Marie-Pierre Robillard',1);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Géraldine Dubois',2);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Charlotte Picard',2);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Marie-Claude Brochard',3);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Joseph Azaïs',4);
INSERT INTO Employe(nom,entreprise_id) VALUES ('José Couturier',4);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Jean-Louis Cuvillier',4);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Théodore Trudeau',5);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Élie Gérald',5);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Claudia Héroux',6);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Zoé Baschet',7);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Ophélie Clair',7);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Julia Galopin',7);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Ambre Corne',8);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Patricia Bethune',8);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Claudine Castex',9);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Maria Du Toit',9);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Josette Adnet',10);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Louise Lajoie',10);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Gabriel Ange',11);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Enzo Gérard',12);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Cyrille Carbonneau',12);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Rémi LaRue',12);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Luc Bertillon',13);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Grégory Thiers',13);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Gérôme Morel',14);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Michel Castex',14);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Marcel Micheaux',15);
INSERT INTO Employe(nom,entreprise_id) VALUES ('Napoléon Bélanger',15);

INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (1,4,2,3,true,'2020-01-02',NULL,'2020-06-03',14,14);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (2,6,4,7,true,'2020-02-04',NULL,'2021-03-13',13,12);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (3,7,4,7,true,'2020-03-06',NULL,'2020-04-06',10,14);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (4,10,5,9,true,'2021-04-08',NULL,'2024-12-24',NULL,NULL);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (5,9,5,9,true,'2021-05-10','2023-01-04','2024-08-01',4,2);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (6,5,3,15,false,'2021-06-12',NULL,'2024-06-12',NULL,NULL);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (7,8,4,7,false,'2022-07-14','2022-10-06','2023-07-14',6,6);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (8,11,2,3,false,'2023-08-16',NULL,'2025-08-20',NULL,NULL);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (9,13,7,2,false,'2023-09-18',NULL,'2025-09-18',NULL,NULL);
INSERT INTO ContratSA(etudiant_id,employe_id,entreprise_id,site_id,type,dateDebut,dateFinAnticipee,dateFinPrevue,noteEntr,noteMA) VALUES (10,12,7,1,false,'2024-10-20',NULL,'2027-03-01',NULL,NULL);

INSERT INTO SiteEntreprise(entreprise_id,site_id) VALUES(6,3);
INSERT INTO SiteEntreprise(entreprise_id,site_id) VALUES(7,1);
INSERT INTO SiteEntreprise(entreprise_id,site_id) VALUES(7,2);
INSERT INTO SiteEntreprise(entreprise_id,site_id) VALUES(4,21);

INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (30,15,'2020-04-21','2022-04-21',10);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (29,15,'2020-03-14','2023-01-01',15);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (28,14,'2021-12-23','2023-12-23',NULL);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (27,14,'2021-05-06','2023-04-06',17);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (26,13,'2022-06-04','2024-06-04',NULL);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (4,3,'2022-07-15','2024-01-01',NULL);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (5,4,'2023-03-25','2024-04-01',NULL);
INSERT INTO ContratVacataire(employe_id,entreprise_id,dateDebut,dateFin,note) VALUES (6,4,'2024-01-01','2026-01-01',NULL);

INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (12,22,'2020-01-29','2022-01-29',3);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (13,25,'2020-03-14','2022-03-14',20);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (14,27,'2020-05-24','2022-05-24',12);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (15,29,'2021-07-14','2023-07-14',NULL);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (15,30,'2021-08-12','2023-08-12',NULL);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (12,24,'2022-09-04','2023-09-04',NULL);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (4,7,'2022-12-04','2024-12-04',NULL);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (10,19,'2023-01-07','2025-01-07',NULL);
INSERT INTO ContratLabo (laboratoire_id,employe_id,dateDebut,dateFin,note) VALUES (11,21,'2023-06-12','2025-06-12',NULL);
