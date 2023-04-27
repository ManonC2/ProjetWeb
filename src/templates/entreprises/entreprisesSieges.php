<?php ob_start(); ?>

<?php 
foreach ($entreprises as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getNom()); ?>
        </h3>
        <p>
            <?= htmlspecialchars($e->getSiege()->getAdresse()); ?>
            <?= htmlspecialchars($e->getSiege()->getVille()); ?>
            <?= htmlspecialchars($e->getSiege()->getPays()); ?>

        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>