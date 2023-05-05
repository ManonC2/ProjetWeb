<?php ob_start(); ?>
    <table class="table w-75 mx-auto">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        </tr>
  </thead>
  <tbody>
  <?php 
foreach ($employes as $e) {
?>
<tr>
      <td scope="row"> <?= htmlspecialchars($e->getNom()); ?></td>
</tbody>

<?php
}
$content = ob_get_clean(); 

require('./src/templates/base.php');?>