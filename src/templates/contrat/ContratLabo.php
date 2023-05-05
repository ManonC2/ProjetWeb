<?php ob_start(); ?>

    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Nom du laboratoire</th>
        <th scope="col">Entreprise</th>
        <th scope="col">Référent</th>
        <th scope="col">Début</th>
        <th scope="col">Fin</th>
        </tr>
  </thead>
  <tbody>
  <?php 
foreach ($contratsLabo as $e) {
?>
<tr>
      <td scope="row"> <?= htmlspecialchars($e->getLaboratoire()->getNom()); ?></td>
      <td> <?= htmlspecialchars($e->getEntreprise()->getNom()); ?></td>
      <td> <?= htmlspecialchars($e->getEmploye()->getNom()); ?></td>
      <td> <?= htmlspecialchars($e->getDateDebut()); ?></td>
      <td> <?= htmlspecialchars($e->getDateFin()); ?></td>

</tbody>


<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>