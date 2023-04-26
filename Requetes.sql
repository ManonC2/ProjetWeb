DROP VIEW IF EXISTS VueEntpCourrier;
DROP VIEW IF EXISTS VueEntpBlocked;
DROP VIEW IF EXISTS VueVacMds;
DROP VIEW IF EXISTS VueVacMdsCurrent;
DROP VIEW IF EXISTS VueNbByContrat;
DROP VIEW IF EXISTS VueEntpNbByContrat;
DROP VIEW IF EXISTS VueLaboContrat;
DROP VIEW IF EXISTS VueMds;
DROP VIEW IF EXISTS VueVacataire;
DROP VIEW IF EXISTS VueAlternant;
DROP VIEW IF EXISTS VueStagiare;
DROP VIEW IF EXISTS VueEtudiant;
DROP VIEW IF EXISTS VueConflict;
DROP VIEW IF EXISTS VueYearStatEntps;
DROP VIEW IF EXISTS VueConflitEtudiant;
DROP VIEW IF EXISTS VueConflitEtudiant2;
DROP VIEW IF EXISTS VueMdsNote;
DROP VIEW IF EXISTS QtDefaultOverflow;
DROP VIEW IF EXISTS QtDefaultFinAnticipe;
DROP VIEW IF EXISTS QtDefaultMaOverflow;
DROP VIEW IF EXISTS QtDefaultContratEtuOverflow;
DROP VIEW IF EXISTS QtDefaultContratVacaOverflow;
DROP VIEW IF EXISTS QtDefaultContratLaboOverflow;

#1
CREATE VIEW VueEntpCourrier AS
SELECT Entreprise.id, Entreprise.nom, Site.adresse 
FROM Entreprise INNER JOIN Site on Entreprise.siege = Site.id;

#2
CREATE VIEW VueEntpBlocked AS
SELECT * 
FROM Entreprise 
WHERE Entreprise.bloque;

#3
CREATE VIEW VueVacMds AS
SELECT id,nom 
FROM Employe 
WHERE id in (
    SELECT employe_id 
    FROM ContratVacataire
) and id in (
    SELECT employe_id 
    FROM ContratSA
);

#4
CREATE VIEW VueVacMdsCurrent AS
SELECT id,nom 
FROM Employe 
WHERE id IN (
    SELECT employe_id 
    FROM ContratVacataire 
    WHERE dateDebut < CURRENT_DATE() and dateFin > CURRENT_DATE()
) AND id IN (
    SELECT employe_id 
    FROM ContratSA WHERE dateDebut < CURRENT_DATE() AND ((dateFinAnticipee IS NULL AND dateFinPrevue > CURRENT_DATE()) OR (dateFinAnticipee > CURRENT_DATE()))
);

#5
    #totale
CREATE VIEW VueNbByContrat AS
SELECT COUNT(DISTINCT stage.id) AS nbStage, COUNT(DISTINCT alternance.id) AS nbAlternance, COUNT(DISTINCT ContratVacataire.id) AS nbContratVacataire, COUNT(DISTINCT Donation.id) AS nbDonation, COUNT(DISTINCT ContratLabo.id) AS nbContratLabo
FROM ((SELECT * from ContratSA WHERE type) stage CROSS JOIN (SELECT * FROM ContratSA WHERE NOT type) alternance)
CROSS JOIN ContratVacataire CROSS JOIN Donation CROSS JOIN ContratLabo;

    #par entreprise
CREATE VIEW VueEntpNbByContrat AS
SELECT stage.id, stage.nom, nbStage, nbAlternance, nbContratVacataire, nbContratLabo, nbDonation
FROM (SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbStage FROM Entreprise LEFT JOIN(SELECT ContratSA.entreprise_id, COUNT(*) as nb FROM ContratSA WHERE type GROUP BY ContratSA.entreprise_id) csa ON Entreprise.id = csa.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) stage
INNER JOIN
(SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbAlternance FROM Entreprise LEFT JOIN (SELECT ContratSA.entreprise_id, COUNT(*) as nb FROM ContratSA WHERE NOT type GROUP BY ContratSA.entreprise_id) csa ON Entreprise.id = csa.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) alternance ON stage.id=alternance.id
INNER JOIN
(SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbContratVacataire FROM Entreprise LEFT JOIN (SELECT ContratVacataire.entreprise_id, COUNT(*) as nb FROM ContratVacataire GROUP BY ContratVacataire.entreprise_id) cv ON Entreprise.id=cv.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) contratV ON stage.id=contratV.id
INNER JOIN
(SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbContratLabo FROM Entreprise LEFT JOIN (SELECT ContratLabo.entreprise_id, COUNT(*) as nb FROM ContratLabo GROUP BY ContratLabo.entreprise_id) cl ON Entreprise.id=cl.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) contratL ON stage.id=contratL.id
INNER JOIN
(SELECT Entreprise.id, Entreprise.nom, SUM(nb) as nbDonation FROM Entreprise LEFT JOIN (SELECT Donation.entreprise_id, COUNT(*) as nb FROM Donation GROUP BY Donation.entreprise_id) d ON Entreprise.id=d.entreprise_id GROUP BY Entreprise.id, Entreprise.nom) Dona ON stage.id=Dona.id;

#6
CREATE VIEW VueLaboContrat AS
SELECT ContratLabo.*, Entreprise.id AS entrId, Entreprise.nom 
FROM ContratLabo INNER JOIN Entreprise ON ContratLabo.entreprise_id = Entreprise.id;

#7
CREATE VIEW VueMds AS
SELECT Employe.id, Employe.nom 
FROM Employe 
WHERE id IN (SELECT employe_id from ContratSA);

#8
CREATE VIEW VueVacataire AS
SELECT Employe.id, Employe.nom 
FROM Employe 
WHERE id IN (SELECT employe_id from ContratVacataire);

#9
CREATE VIEW VueAlternant AS
SELECT * 
FROM Etudiant 
WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE NOT type);

#10
CREATE VIEW VueStagiare AS
SELECT * 
FROM Etudiant 
WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE type);

#11
CREATE VIEW VueEtudiant AS
SELECT * 
FROM Etudiant 
WHERE id IN (SELECT etudiant_id FROM ContratSA);

#12
CREATE VIEW VueConflict AS
SELECT ContratSA.id, ContratSA.type, YEAR(ContratSA.dateFinAnticipee) AS annee, Entreprise.nom 
FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id 
WHERE ContratSA.dateFinAnticipee IS NOT NULL 
ORDER BY Entreprise.nom,ContratSA.dateFinAnticipee;

#13
CREATE VIEW VueYearStatEntps AS
SELECT Entreprise.nom,COUNT(ContratSA.noteEntr),MIN(ContratSA.noteEntr),AVG(ContratSA.noteEntr),MAX(ContratSA.noteEntr) 
FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id 
WHERE (ContratSA.dateFinAnticipee IS NULL and ContratSA.dateFinPrevue < CURRENT_DATE()) OR ContratSA.dateFinAnticipee < CURRENT_DATE() 
GROUP BY Entreprise.nom;

#14
CREATE VIEW VueConflitEtudiant AS
SELECT Etudiant.id, Etudiant.numeroEtudiant, YEAR(ContratSA.dateFinAnticipee), Entreprise.nom 
FROM (ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id) INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id 
WHERE ContratSA.dateFinAnticipee IS NOT NULL AND Etudiant.id in (
    SELECT ContratSA.etudiant_id 
    FROM ContratSA 
    WHERE ContratSA.dateFinAnticipee IS NOT NULL 
    GROUP BY ContratSA.etudiant_id HAVING COUNT(ContratSA.id)=1
);

--10
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE type);

#16
CREATE VIEW VueMdsNote AS
SELECT Employe.id, Employe.nom, AVG(ContratSA.noteMA) AS noteMOY 
FROM ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id WHERE ContratSA.noteMA IS NOT NULL 
GROUP BY Employe.id, Employe.nom,YEAR(ContratSA.dateFinPrevue) 
ORDER BY YEAR(ContratSA.dateFinPrevue) DESC, Employe.nom ASC;

#17
    #QtDefaultOverflow
CREATE VIEW QtDefaultOverflow AS
SELECT Entreprise.id, Entreprise.nom 
FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id 
GROUP BY Entreprise.id,Entreprise.nom 
HAVING (COUNT(ContratSA.etudiant_id) / SUM(Entreprise.nbEmployes)) > 0.15 AND COUNT(ContratSA.etudiant_id) > 3;

    #QtDefaultFinAnticipe
CREATE VIEW QtDefaultFinAnticipe AS
SELECT	Etudiant.id, Etudiant.numeroEtudiant 
FROM (ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id) INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id 
WHERE ContratSA.dateFinAnticipee IS NOT NULL AND Etudiant.id in (
    SELECT ContratSA.etudiant_id 
    FROM ContratSA 
    WHERE ContratSA.dateFinAnticipee IS NOT NULL 
    GROUP BY ContratSA.etudiant_id 
    HAVING COUNT(ContratSA.id)>2
);    

    #QtDefaultMaOverflow
CREATE VIEW QtDefaultMaOverflow AS
SELECT Employe.id, Employe.nom 
FROM ContratSA INNER JOIN Employe ON ContratSA.employe_id=Employe.id 
GROUP BY Employe.id, Employe.nom 
HAVING COUNT(ContratSA.etudiant_id)>3;  

    #QtDefaultContratEtuOverflow
CREATE VIEW QtDefaultContratEtuOverflow AS
SELECT Etudiant.id, Etudiant.numeroEtudiant 
FROM ContratSA INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id 
WHERE ContratSA.dateDebut < CURRENT_DATE() AND ((ContratSA.dateFinAnticipee IS NULL AND ContratSA.dateFinPrevue > CURRENT_DATE()) OR (ContratSA.dateFinAnticipee > CURRENT_DATE())) 
GROUP BY Etudiant.id, Etudiant.numeroEtudiant 
HAVING COUNT(ContratSA.id)>1;    

    #QtDefaultContratVacaOverflow
CREATE VIEW QtDefaultContratVacaOverflow AS
SELECT Employe.id, Employe.nom 
FROM ContratVacataire INNER JOIN Employe ON ContratVacataire.employe_id=Employe.id 
WHERE dateDebut < CURRENT_DATE() and dateFin > CURRENT_DATE() 
GROUP BY Employe.id, Employe.nom 
HAVING COUNT(ContratVacataire.id)>1;    

    #QtDefaultContratLaboOverflow
CREATE VIEW QtDefaultContratLaboOverflow AS
SELECT Entreprise.nom AS nomEntreprise, labo.nom AS nomLabo, Employe.nom AS nomEmploye
FROM (((ContratLabo AS cl1 INNER JOIN ContratLabo AS cl2 on cl1.laboratoire_id=cl2.laboratoire_id) INNER JOIN Entreprise ON cl1.entreprise_id=Entreprise.id)
INNER JOIN Entreprise AS labo ON cl1.laboratoire_id=labo.id) INNER JOIN Employe ON cl1.employe_id=Employe.id
WHERE (cl1.dateDebut < CURRENT_DATE() AND cl1.dateFin > CURRENT_DATE()) AND (cl2.dateDebut < CURRENT_DATE() AND cl2.dateFin > CURRENT_DATE()) AND cl1.id != cl2.id AND cl1.employe_id = cl2.employe_id AND cl1.entreprise_id=cl2.entreprise_id;
