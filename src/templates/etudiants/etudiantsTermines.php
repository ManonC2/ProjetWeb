<?php ob_start(); ?>

    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Numéro étudiant</th>
        <th scope="col">Nationalité</th>
        <th scope="col">Nom de l'entreprise d'accueil</th>
        <th scope="col">Année de fin du contrat</th>
        </tr>
  </thead>
  <tbody>

<?php 
foreach ($etudiantsTermines as $e) {
?>
<tr>
      <td scope="row"><?= htmlspecialchars($e['numEtu']); ?>
</td>
      <td><?= nl2br(htmlspecialchars($e['nationalite'])); ?></td>
      <td><?= nl2br(htmlspecialchars($e['entNom'])); ?></td>
      <td><?= nl2br(htmlspecialchars($e['anneeFin'])); ?></td>

</tbody>    
<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>