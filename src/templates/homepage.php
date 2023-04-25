<?php ob_start(); ?>
<h1 class="">Bienvenue sur ManageME</h1>
<a href="#">Entreprise et adresse<br></a>
<a href="#">Entreprises bloquées<br></a>
<a href="#">Vacataires + maîtres de stage tout temps<br></a>
<a href="#">Vacataires + maîtres de stage en ce moment<br></a>
<a href="#">Nombres de contrats <br></a>
<a href="#">Contrats d'un laboratoire<br></a>
<a href="#">Maîtres de stage<br></a>
<a href="#">Vacataires<br></a>
<a href="#">Alternants<br></a>
<a href="#">Stagiaires<br></a>
<a href="#">Stagiaires + Alternants<br></a>
<a href="#">Contrats avec fin anticipée<br></a>
<a href="#">Nombres de contrats terminés + note<br></a>
<a href="#">Etudiants avec contrat fin anticipée<br></a>
<a href="#">Etudiants avec deux contrats à fin anticipée<br></a>
<a href="#">Maîtres de stages + note cumulée<br></a>
<a href="#">Contrôle qualité<br></a>

<?php 
var_dump($etudiant); 
$content = ob_get_clean(); 

require('base.php');?>