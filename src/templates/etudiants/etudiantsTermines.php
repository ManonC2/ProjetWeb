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
            <?= nl2br(htmlspecialchars($e['entNom'])); ?>
        </p>
        <p> 
            <?= nl2br(htmlspecialchars($e['anneeFin'])); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>