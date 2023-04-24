--1
SELECT Entreprise.id, Entreprise.nom, Site.adresse FROM Entreprise INNER JOIN Site on Entreprise.siege = Site.id;

--2
SELECT * from Entreprise WHERE Entreprise.bloque;

--3
SELECT id,nom FROM Employe where id in (SELECT employe_id from ContratVacataire) and id in (SELECT employe_id FROM ContratSA);

--4
SELECT id,nom FROM Employe WHERE id IN (SELECT employe_id from ContratVacataire WHERE dateDebut < CURRENT_DATE() and dateFin > CURRENT_DATE()) AND id IN (SELECT employe_id FROM ContratSA WHERE dateDebut < CURRENT_DATE() AND ((dateFinAnticipee IS NULL AND dateFinPrevue > CURRENT_DATE()) OR (dateFinAnticipee > CURRENT_DATE())));

--5
    --totale
SELECT COUNT(id) FROM ContratLabo;
SELECT COUNT(id) FROM ContratVacataire;
SELECT COUNT(id) FROM Donation;
SELECT COUNT(id) FROM ContratSA WHERE type; --stage
SELECT COUNT(id) FROM ContratSA WHERE !(type); --alternance

    --par entreprise
SELECT COUNT(ContratLabo.id) FROM ContratLabo INNER JOIN Entreprise on ContratLabo.laboratoire_id = Entreprise.id where nom='<NOM>';
SELECT COUNT(ContratVacataire.id) FROM (ContratVacataire INNER JOIN Employe ON Employe.id = ContratVacataire.employe_id) INNER JOIN Entreprise ON Employe.entreprise_id = Entreprise.id where Entreprise.nom='<NOM>';
SELECT COUNT(id) FROM Donation INNER JOIN Entreprise on Donation.entreprise_id = Entreprise.id where nom='<NOM>';
SELECT COUNT(ContratSA.id) FROM (ContratSA INNER JOIN Employe ON Employe.id = ContratSA.employe_id) INNER JOIN Entreprise ON Employe.entreprise_id = Entreprise.id WHERE type AND Entreprise.nom = '<NOM>'; --stage
SELECT COUNT(ContratSA.id) FROM (ContratSA INNER JOIN Employe ON Employe.id = ContratSA.employe_id) INNER JOIN Entreprise ON Employe.entreprise_id = Entreprise.id WHERE !(type) AND Entreprise.nom = '<NOM>'; --alternance

--6
SELECT * from ContratLabo INNER JOIN Entreprise ON ContratLabo.laboratoire_id = Entreprise.id WHERE Entreprise.nom = '<NOM>';

--7
SELECT Employe.id, Employe.nom FROM Employe WHERE id IN (SELECT employe_id from ContratSA);

--8
SELECT Employe.id, Employe.nom FROM Employe WHERE id IN (SELECT employe_id from ContratVacataire);

--9
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE !(type));

--10
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE type);

--11
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA);

--12
SELECT ContratSA.id, ContratSA.type, YEAR(ContratSA.dateFinAnticipee) AS annee, Entreprise.nom FROM (ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id) INNER JOIN Entreprise ON Employe.entreprise_id=Entreprise.id WHERE ContratSA.dateFinAnticipee IS NOT NULL ORDER BY Entreprise.nom,ContratSA.dateFinAnticipee;

--13
SELECT Entreprise.nom,COUNT(ContratSA.noteEntr),MIN(ContratSA.noteEntr),AVG(ContratSA.noteEntr),MAX(ContratSA.noteEntr) FROM(ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id) INNER JOIN Entreprise ON Employe.entreprise_id=Entreprise.id WHERE (ContratSA.dateFinAnticipee IS NULL and ContratSA.dateFinPrevue < CURRENT_DATE()) OR ContratSA.dateFinAnticipee < CURRENT_DATE() GROUP BY Entreprise.nom;

--14
SELECT Etudiant.id, Etudiant.numeroEtudiant, YEAR(ContratSA.dateFinAnticipee) AS annee, Entreprise.nom FROM ((ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id) INNER JOIN Entreprise ON Employe.entreprise_id=Entreprise.id) INNER JOIN Etudiant on ContratSA.etudiant_id=Etudiant.id WHERE ContratSA.dateFinAnticipee IS NOT NULL AND Etudiant.id IN (SELECT Etudiant.id FROM ((ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id) INNER JOIN Entreprise ON Employe.entreprise_id=Entreprise.id) INNER JOIN Etudiant on ContratSA.etudiant_id=Etudiant.id WHERE ContratSA.dateFinAnticipee IS NOT NULL  GROUP BY Etudiant.id HAVING COUNT(ContratSA.id) = 1);

--15


