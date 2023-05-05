<?php ob_start(); ?>

    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Numéro étudiant</th>
        <th scope="col">Nationalité</th>
        </tr>
  </thead>
  <tbody>
  <?php 
foreach ($etudiants as $e) {
?>
<tr>
      <td scope="row"> <?= htmlspecialchars($e->getNumeroEtudiant()); ?></td>
      <td><?= nl2br(htmlspecialchars($e->getNationalite())); ?></td>
</tbody>
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>