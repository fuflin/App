<?php ob_start() ?>

<h1>Bienvenue sur ma page detail acteur/actrice</h1>

<?php

$acteur = $acteur->fetch();


$date = new DateTime($acteur['birth_date']);

?>
<div class="card" style="width: 18rem;">
  <img src="<?=$acteur['photo']?>" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Détail du film</h5>
    <p class="card-text"><?php
    echo "Nom: ".$acteur['lastname']. "<br>";
    echo "Prénom: ".$acteur['firstname']. "<br>";
    echo "Date de naissance: " .date_format($date, "d F Y"). "<br>";?></p>
  </div>
</div>

<?php


$title = "détails de l'acteur";
$contenu = ob_get_clean(); 
require "View/layout.php";