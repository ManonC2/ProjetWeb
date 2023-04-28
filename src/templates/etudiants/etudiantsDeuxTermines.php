<?php ob_start(); ?>

<?php 
foreach ($etudiantsTermines as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e['numEtu']); ?>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($e['nationalite'])); ?>
        </p>
        <p>
            Entreprsise 1 : <?= nl2br(htmlspecialchars($e['Entr1'])); ?>
        </p>
        <p> 
            Annee 1 : <?= nl2br(htmlspecialchars($e['AnneeFin1'])); ?>
        </p>
        <p>
            Entreprsise 2 : <?= nl2br(htmlspecialchars($e['Entr2'])); ?>
        </p>
        <p> 
            Annee 2 : <?= nl2br(htmlspecialchars($e['AnneeFin2'])); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>