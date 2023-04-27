<?php
require_once('src/Controller/BaseController.php');
require_once('src/Controller/EtudiantController.php');
require_once('src/Controller/EntrepriseController.php');
require_once('src/Controller/EmployeController.php');
require_once('src/Controller/ContratController.php');

use Application\Controller\BaseController;
use Application\Controller\EtudiantController;
use Application\Controller\EntrepriseController;
use Application\Controller\EmployeController;
use Application\Controller\ContratController;

//Affiche la page d'accueil avec tous les liens FONCTIONNE
// (new BaseController)->base();

//Affiche le nom d'une entreprise et l'adresse de son siège FONCTIONNE
// (new EntrepriseController)->entrepriseAdresse();

//Affiche les employés à la fois vacataires et maîtres de stage (tout temps) FONCTIONNE
// (new EmployeController)->vacatairesMAToutTemps();

//Affiche les employés à la fois vacataires et maîtres de stage (courant)FONCTIONNE
// (new EmployeController)->vacatairesMACourant();

//Affiche les contrats 
// (new ContratController)->getNombreContrats();

//Affiche les contrats d'un labo 
//(new ContratController)->getNbContratsLabo();

//Affiche les entreprises bloquées FONCTIONNE
// (new EntrepriseController)->entreprisesBloquees();

//Affiche la totalité des alternants FONCTIONNE
// (new EtudiantController)->alternants();

//Affiche la totalité des stagiaires FONCTIONNE
// (new EtudiantController)->stagiaires();

//Affiche la totalité des stagiaires et étudiants FONCTIONNE
// (new EtudiantController)->all();

//Affiche les maîtres de stage FONCTIONNE
// (new EmployeController)->getMA();

//Affiche les vacataires FONCTIONNE
// (new EmployeController)->getVacataires();

//Affiche les contrats avec fin anticipée 
// (new ContratController)->getConflits();

//Affiche les contrats terminés 
//(new ContratController)->getTermines();

//Affiche les étudiants avec un contrat terminé FONCTIONNE 
// (new EtudiantController)->etudiantsTermines();

//Affiche les étudiants ayant eu deux contrats avec fin anticipée 
// (new EtudiantController)->getEtudiantsDeuxAnticipes();

//Affiche les maîtres de stage avec leur note FONCTIONNE
// (new EmployeController)->getMANote();

//Affiche les Maitres de stage qui on plus de 3 etudiants
//(new EmployeController)->getQtDefaultMaOverflow();

//Affiche les employe qui on plus d'un contrat Vacataire
//(new EmployeController)->getQtDefaultContratVacaOverflow();

//Affiche les Contrats Labo qui on le même referents
//(new ContratController)->getQtDefaultContratLaboOverflow();

//Affiche les entreprise qui ont trop d'etudiant en stage ou en alternance
//(new EntrepriseController)->getQtEntrepriseOverflow();

//Affiche les Etudiant qui on plus de 3 fin Anticipe
//(new EtudiantController)->getQtFinAnticipe();

//Affiche les Etudiant qui on plus de 1 contrat
//(new EtudiantController)->getQtDefaultContratEtuOverflow();