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
SELECT COUNT(ContratVacataire.id) FROM ContratVacataire INNER JOIN Entreprise ON ContratVacataire.entreprise_id = Entreprise.id WHERE Entreprise.nom='<NOM>';
SELECT COUNT(id) FROM Donation INNER JOIN Entreprise on Donation.entreprise_id = Entreprise.id where nom='<NOM>';
SELECT COUNT(ContratSA.id) FROM ContratSA INNER JOIN Entreprise on ContratSA.entreprise_id = Entreprise.id WHERE Entreprise.nom = '<NOM>' and type; --stage
SELECT COUNT(ContratSA.id) FROM ContratSA INNER JOIN Entreprise on ContratSA.entreprise_id = Entreprise.id WHERE Entreprise.nom = '<NOM>' and !(type); --alternance

--6
SELECT * from ContratLabo INNER JOIN Entreprise ON ContratLabo.laboratoire_id = Entreprise.id WHERE Entreprise.nom = '<NOM>';

--7
SELECT Employe.id, Employe.nom FROM Employe WHERE id IN (SELECT employe_id from ContratSA);

--8
SELECT Employe.id, Employe.nom FROM Employe WHERE id IN (SELECT employe_id from ContratVacataire);

--9 Alternants
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE !(type));

--10 Stagiaires
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA WHERE type);

--11
SELECT * FROM Etudiant WHERE id IN (SELECT etudiant_id FROM ContratSA);

--12
SELECT ContratSA.id, ContratSA.type, YEAR(ContratSA.dateFinAnticipee) AS annee, Entreprise.nom FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id WHERE ContratSA.dateFinAnticipee IS NOT NULL ORDER BY Entreprise.nom,ContratSA.dateFinAnticipee;

--13
SELECT Entreprise.nom,COUNT(ContratSA.noteEntr),MIN(ContratSA.noteEntr),AVG(ContratSA.noteEntr),MAX(ContratSA.noteEntr) FROM ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id WHERE (ContratSA.dateFinAnticipee IS NULL and ContratSA.dateFinPrevue < CURRENT_DATE()) OR ContratSA.dateFinAnticipee < CURRENT_DATE() GROUP BY Entreprise.nom;

--14
SELECT	Etudiant.id, Etudiant.numeroEtudiant, YEAR(ContratSA.dateFinAnticipee), Entreprise.nom FROM (ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id) INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id WHERE ContratSA.dateFinAnticipee IS NOT NULL AND Etudiant.id in (SELECT ContratSA.etudiant_id FROM ContratSA WHERE ContratSA.dateFinAnticipee IS NOT NULL GROUP BY ContratSA.etudiant_id HAVING COUNT(ContratSA.id)=1);

--15 (Prendre une valeur sur deux)
SELECT Etudiant.id, Etudiant.numeroEtudiant, YEAR(ContratSA1.dateFinAnticipee) AS AnneeFin1, Entreprise1.nom AS Entr1, YEAR(ContratSA2.dateFinAnticipee) AS AnneeFin2, Entreprise2.nom as Entr2 FROM (((ContratSA AS ContratSA1 INNER JOIN Entreprise AS Entreprise1 ON ContratSA1.entreprise_id=Entreprise1.id) INNER JOIN Etudiant ON ContratSA1.etudiant_id=Etudiant.id)INNER JOIN ContratSA AS ContratSA2 ON ContratSA2.etudiant_id = Etudiant.id) INNER JOIN Entreprise AS Entreprise2 ON ContratSA2.entreprise_id = Entreprise2.id WHERE ContratSA1.dateFinAnticipee IS NOT NULL AND ContratSA2.dateFinAnticipee IS NOT NULL AND  ContratSA1.id != ContratSA2.id;
    
--16
SELECT Employe.id, Employe.nom, AVG(ContratSA.noteMA) AS noteMOY FROM ContratSA INNER JOIN Employe ON ContratSA.employe_id = Employe.id WHERE ContratSA.noteMA IS NOT NULL GROUP BY Employe.id, Employe.nom,YEAR(ContratSA.dateFinPrevue) ORDER BY YEAR(ContratSA.dateFinPrevue) DESC, Employe.nom ASC;

--17
    --QtDefaultOverflow
SELECT Entreprise.id, Entreprise.nom FROM ContratSA INNER JOIN Entreprise on ContratSA.entreprise_id=Entreprise.id GROUP BY Entreprise.id,Entreprise.nom HAVING (COUNT(ContratSA.etudiant_id)/ SUM(Entreprise.nbEmployes)>0.15 AND COUNT(ContratSA.etudiant_id) > 3;
    --QtDefaultFinAnticipe
SELECT	Etudiant.id, Etudiant.numeroEtudiant FROM (ContratSA INNER JOIN Entreprise ON ContratSA.entreprise_id=Entreprise.id) INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id WHERE ContratSA.dateFinAnticipee IS NOT NULL AND Etudiant.id in (SELECT ContratSA.etudiant_id FROM ContratSA WHERE ContratSA.dateFinAnticipee IS NOT NULL GROUP BY ContratSA.etudiant_id HAVING COUNT(ContratSA.id)>2);
    --QtDefaultMaOverflow
SELECT Employe.id, Employe.nom FROM ContratSA INNER JOIN Employe ON ContratSA.employe_id=Employe.id GROUP BY Employe.id, Employe.nom HAVING COUNT(ContratSA.etudiant_id)>3;
    --QtDefaultContratEtuOverflow
SELECT Etudiant.id, Etudiant.numeroEtudiant FROM ContratSA INNER JOIN Etudiant ON ContratSA.etudiant_id=Etudiant.id WHERE ContratSA.dateDebut < CURRENT_DATE() AND ((ContratSA.dateFinAnticipee IS NULL AND ContratSA.dateFinPrevue > CURRENT_DATE()) OR (ContratSA.dateFinAnticipee > CURRENT_DATE())) GROUP BY Etudiant.id, Etudiant.numeroEtudiant HAVING COUNT(ContratSA.id)>1;
    --QtDefaultContratVacaOverflow
SELECT Employe.id, Employe.nom FROM ContratVacataire INNER JOIN Employe ON ContratVacataire.employe_id=Employe.id WHERE dateDebut < CURRENT_DATE() and dateFin > CURRENT_DATE() GROUP BY Employe.id, Employe.nom HAVING COUNT(ContratVacataire.id)>1;
    --QtDefaultContratLaboOverflow
    SELECT * FROM ContratLabo AS cl1 INNER JOIN ContratLabo AS cl2 on cl1.laboratoire_id=cl2.laboratoire_id WHERE (cl1.dateDebut < CURRENT_DATE() AND cl1.dateFin > CURRENT_DATE()) AND (cl2.dateDebut < CURRENT_DATE() AND cl2.dateFin > CURRENT_DATE()) AND cl1.id != cl2.id AND cl1.employe_id = cl2.employe_id ;
