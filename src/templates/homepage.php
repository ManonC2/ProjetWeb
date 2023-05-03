<?php ob_start(); ?>
<h1 class="">Bienvenue sur ManageME</h1>
<div class="d-flex flex-wrap justify-content-center">
    <a class="btn btn-outline-info m-4" href="index.php?action=1">Entreprise et adresse<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=2">Entreprises bloquées<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=3">Vacataires + maîtres de stage tout temps<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=4">Vacataires + maîtres de stage en ce moment<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=5">Nombres de contrats <br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=6">Contrats d'un laboratoire<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=7">Maîtres de stage<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=8">Vacataires<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=9">Alternants<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=10">Stagiaires<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=11">Stagiaires + Alternants<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=12">Contrats avec fin anticipée<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=13">Nombres de contrats terminés + note<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=14">Etudiants avec contrat fin anticipée<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=15">Etudiants avec deux contrats à fin anticipée<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=16">Maîtres de stages + note cumulée<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=17">Contrôle qualité<br></a>
</div>

<?php 
$content = ob_get_clean(); 

require('base.php');?>