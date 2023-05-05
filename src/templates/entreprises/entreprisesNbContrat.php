<?php ob_start(); ?>

    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Stages</th>
        <th scope="col">Alternances</th>
        <th scope="col">Vacataires</th>
        <th scope="col">Laboratoire</th>
        <th scope="col">Donation</th>
        </tr>
  </thead>
  <tbody>
  <?php 
foreach ($entreprises as $e) {
?>
<tr>
      <td scope="row"> <?= htmlspecialchars($e['nom']); ?></td>
      <td> <?= htmlspecialchars($e['nbStage']); ?></td>
      <td> <?= htmlspecialchars($e['nbAlternance']); ?></td>
      <td> <?= htmlspecialchars($e['nbContratVacataire']); ?></td>
      <td> <?= htmlspecialchars($e['nbContratLabo']); ?></td>
      <td> <?= htmlspecialchars($e['nbDonation']); ?></td>

</tbody>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>