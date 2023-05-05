<?php ob_start(); ?>

    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Nom de l'entreprise</th>
        <th scope="col">Nombre de contrats terminés</th>
        <th scope="col">Note minimale</th>
        <th scope="col">Note maximale</th>
        <th scope="col">Moyenne</th>
        </tr>
  </thead>
  <tbody>

<?php 
foreach ($entreprises as $e) {
?>
        <td scope="row">
            <?= htmlspecialchars($e['nom']); ?>
</td>
        <td>
            <?= htmlspecialchars($e['nb']); ?>
</td>
        <td>
            <?= htmlspecialchars($e['min']); ?>
</td>
        <td>
            <?= htmlspecialchars($e['max']); ?>
</td>
        <td>
            <?= htmlspecialchars($e['moy']); ?>
</td>
  </tbody>
  <?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>