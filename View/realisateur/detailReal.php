<?php ob_start() ?>

<h1>Bienvenue sur ma page detail réalisateur</h1>

<?php

$realisateur = $realisateur->fetch();
$film = $film->fetch();


?>

<div class="card" style="width: 18rem;">
  <img src="<?=$realisateur['photo'];?>" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Filmographie</h5>
    <p class="card-text"><?php
    echo "Prénom: " .$realisateur['firstname']. "<br>";
    echo "Nom: " .$realisateur['lastname']. "<br>";
    echo "Film réalisé: " .$film['title']. "<br>";
    ?></p>
    
  </div>
</div>

<?php


$title = "détails du réalisateur";
$contenu = ob_get_clean(); 
require "View/layout.php";