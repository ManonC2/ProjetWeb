<?php ob_start(); ?>

    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Nom de l'entreprise</th>
        <th scope="col">Date de fin anticipée</th>
        <th scope="col">Type de contrat</th>
        </tr>
  </thead>
  <tbody>

<?php 
foreach ($ContratsSA as $e) {
?>
        <td scope="row">
            <?= htmlspecialchars($e->getEntreprise()->getNom()); ?>
</td>
        <td>
        <?= htmlspecialchars($e->getDateFinAnticipee()); ?>
</td>
        <td>
        <?php
         if(!($e->getType())){
            echo "Alternance";
         } else {
            echo "Stage";
         }
         ?>
</td>
  </tbody>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>