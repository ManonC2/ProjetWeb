<?php
require_once('src/Controller/BaseController.php');
require_once('src/Controller/EtudiantController.php');
require_once('src/Controller/EntrepriseController.php');

use Application\Controller\BaseController;
use Application\Controller\EtudiantController;
use Application\Controller\EntrepriseController;

//Affiche la page d'accueil avec tous les liens FONCTIONNE
// (new BaseController)->base();

//Affiche le nom d'une entreprise et l'adresse de son siège
// (new EntrepriseController)->entrepriseAdresse();

//Affiche les employés à la fois vacataires et maîtres de stage (tout temps)
//(new EmployeController)->vacatairesMAToutTemps();

//Affiche les employés à la fois vacataires et maîtres de stage (courant)
//(new EmployeController)->vacatairesMACourant();

//Affiche les contrats 
//(new ContratController)->getNombreContrats();

//Affiche les contrats d'un labo 
//(new ContratController)->getNbContratsLabo();

//Affiche les entreprises bloquées FONCTIONNE
// (new EntrepriseController)->entreprisesBloquees();

//Affiche la totalité des alternants FONCTIONNE
// (new EtudiantController)->alternants();

//Affiche la totalité des stagiaires FONCTIONNE
// (new EtudiantController)->stagiaires();

//Affiche la totalité des stagiaires et étudiants
// (new EtudiantController)->all();

//Affiche les maîtres de stage 
//(new EmployeController)->getMA();

//Affiche les vacataires 
//(new EmployeController)->getVacataires();

//Affiche les contrats avec fin anticipée 
//(new ContratController)->getConflits();

//Affiche les contrats terminés 
//(new ContratController)->getTermines();

//Affiche les étudiants avec un contrat terminé 


