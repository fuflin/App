<?php ob_start() ?>

<h1 style="text-align: center;">Détail des acteurs/actrices</h1>

<?php

$acteur = $acteur->fetch();


$date = new DateTime($acteur['birth_date']);

?>
<div style="display: flex;justify-content: center;width: 60%;margin: auto;">
  <div class="card" style="width: 40%;">
  <img src="<?=$acteur['photo']?>" class="card-img-top">
    <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Détail de l'acteur</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" style="text-align: center;"><?="<strong>Nom:  </strong><br>".$acteur['lastname']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Prénom: </strong><br>" .$acteur['firstname']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Date de naissance: </strong><br>" .date_format($date, "d F Y"). "<br>";?></li>
    </ul>
  </div>
</div>

<?php


$title = "détails de l'acteur";
$contenu = ob_get_clean(); 
require "View/layout.php";