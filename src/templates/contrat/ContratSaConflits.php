<?php ob_start(); ?>

<?php 
foreach ($Contrats as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getEntreprise()->getNom()); ?>
        </h3>
        <p>
        <?= htmlspecialchars($e->getDateFinAnticipee()); ?>
        </p>
        <p>
        <?= htmlspecialchars($e->getDateFinAnticipee()); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>