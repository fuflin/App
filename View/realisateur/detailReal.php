<?php ob_start() ?>

<h1 style="text-align: center;">Détails des réalisateurs</h1>

<?php

$realisateur = $realisateur->fetch();
$film = $film->fetch();


?>
<div style="display: flex;justify-content: center;width: 60%;margin: auto;">
  <div class="card" style="width: 40%;">
  <img src="<?=$realisateur['photo'];?>" class="card-img-top">
    <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Détail du réalisateur</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" style="text-align: center;"><?="<strong>Nom:  </strong><br>".$realisateur['lastname']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Prénom: </strong><br>" .$realisateur['firstname']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Filmographie: </strong><br>" .$film['title']. "<br>";?></li>
    </ul>
  </div>
</div>

<?php


$title = "détails du réalisateur";
$contenu = ob_get_clean(); 
require "View/layout.php";