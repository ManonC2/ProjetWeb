<?php ob_start(); ?>
    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Nom de l'entreprise</th>
        <th scope="col">Adresse du siège</th>
        </tr>
  </thead>
  <tbody>
  <?php 
foreach ($entreprises as $e) {
?>
<tr>
      <td scope="row"> <?= htmlspecialchars($e->getNom()); ?></td>
      <td>            <?= htmlspecialchars($e->getSiege()->getAdresse()); ?>
            <?= htmlspecialchars($e->getSiege()->getVille()); ?>
            <?= htmlspecialchars($e->getSiege()->getPays()); ?>

</td>
</tbody>

<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>