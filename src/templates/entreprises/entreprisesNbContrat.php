<?php ob_start(); ?>

<?php 
foreach ($entreprises as $e) {
?>
    <div>
        <h3>
            <?= htmlspecialchars($e['nom']); ?>
        </h3>

        <p>
            Nombre Stages : <strong><?= htmlspecialchars($e['nbStage']); ?></strong>
        </p>

        <p>
            Nombre Alternances : <strong><?= htmlspecialchars($e['nbAlternance']); ?></strong>
        </p>

        <p>
            Nombre Contrat Vacataires : <strong><?= htmlspecialchars($e['nbContratVacataire']); ?></strong>
        </p>

        <p>
            Nombre Contrat Laboratoire : <strong><?= htmlspecialchars($e['nbContratLabo']); ?></strong>
        </p>

        <p>
            Nombre Donation : <strong><?= htmlspecialchars($e['nbDonation']); ?></strong>
        </p>
    </div>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>