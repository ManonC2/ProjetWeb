<?php ob_start(); ?>

<?php 
foreach ($ContratsSA as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getEntreprise()->getNom()); ?>
        </h3>
        <p>
        <?= htmlspecialchars($e->getDateFinAnticipee()); ?>
        </p>
        <p>
        <?= htmlspecialchars($e->getType()); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>