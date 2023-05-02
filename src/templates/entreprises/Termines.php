<?php ob_start(); ?>

<?php 
foreach ($entreprises as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e['nom']); ?>
        </h3>
        <p>
            Nombre : <strong><?= htmlspecialchars($e['nb']); ?></strong>
        </p>
        <p>
            Note Min : <strong><?= htmlspecialchars($e['min']); ?></strong>
        </p>
        <p>
            Note Moyenne : <strong><?= htmlspecialchars($e['moy']); ?></strong>
        </p>
        <p>
            Note Max : <strong><?= htmlspecialchars($e['max']); ?></strong>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>