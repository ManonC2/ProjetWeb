<?php ob_start(); ?>

<?php 
foreach ($alternants as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getNumeroEtudiant()); ?>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($e->getNationalite())); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>