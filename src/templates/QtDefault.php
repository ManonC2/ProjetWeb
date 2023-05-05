<?php ob_start(); ?>
<h1 class="">Contrôle qualité</h1>
<div class="d-flex flex-wrap justify-content-center">
    <a class="btn btn-outline-info m-4" href="index.php">Page d'accueil<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=18">Contrat Labo même référent<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=19">Etudiant trop de fin anticipé<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=20">Entreprise avec trop d'étudiant<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=21">Maitre de stage avec trop de contrat<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=22">Vacataire avec trop de contrat<br></a>
    <a class="btn btn-outline-info m-4" href="index.php?action=23">Etudiant avec trop de contrat<br></a>
</div>

<?php 
$content = ob_get_clean(); 

require('base.php');?>