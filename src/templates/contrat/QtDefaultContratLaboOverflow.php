<?php ob_start(); ?>

<?php 
foreach ($Contrats as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getLaboratoire()->getNom()); ?>
        </h3>
        <p>
        <?= htmlspecialchars($e->getEntreprise()->getNom()); ?>
        </p>
        <p>
        <?= htmlspecialchars($e->getEmploye()->getNom()); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>