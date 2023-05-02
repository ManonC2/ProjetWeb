<?php ob_start(); ?>

<?php 
foreach ($contratsLabo as $e) {
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
        <p>
            <?= htmlspecialchars($e->getDateDebut()); ?>
        </p>
        <p>
            <?= htmlspecialchars($e->getDateFin()); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>