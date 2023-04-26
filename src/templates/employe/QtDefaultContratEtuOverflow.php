<?php ob_start(); ?>

<?php 
foreach ($Employes as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e->getNom()); ?>
        </h3>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>