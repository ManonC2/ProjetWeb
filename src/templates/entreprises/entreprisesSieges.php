<?php ob_start(); ?>

<?php 
foreach ($entreprises as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getNom()); ?>
        </h3>
        <p>
            <?= htmlspecialchars($e->getSite()->getAdresse()); ?>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>