<?php ob_start() ?>

<h1 style="text-align: center; color: white;">Bienvenue sur ma page detail film</h1>

<?php

$film = $film->fetch();
$realisateur = $realisateur->fetch();
$genre = $genre->fetch();
$castings = $castings->fetchAll();

$date = new DateTime($film['release_date_fr']);

?>
<div style="display: flex;justify-content: center;width: 70%;margin: auto;">
  <div class="card" style="width: 60%; background-image: url('https://i.pinimg.com/originals/c9/6d/09/c96d09dd9e2ac87f10301cb40f94e8d3.jpg');">
  <img src="<?=$film['poster']?>" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title" style="text-align: center; color: white;"><?="<strong>Titre du film: </strong><br>" .$film['title']. "<br>";?></h5>
    </div>
    <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;"><?="<strong>Résumé du film: </strong><br>" .$film['synopsis']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Réalisateur du film: </strong><br>". $realisateur['firstname']. " " .$realisateur['lastname']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Genre du film: </strong><br>" .$genre['libelle']. "<br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Durée du film: </strong><br>" .$film['duration']. "min <br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Note: </strong><br>" .$film['note']. "/5 <br>";?></li>
      <li class="list-group-item" style="text-align: center;"><?="<strong>Date de sortie: </strong><br>" .date_format($date, "d F Y"). "<br>";?></li>
    </ul>
  </div>
</div>
<br><br><br>

<h2 class="card-title" style="text-align: center; color: white;">Casting du film</h2><br><br><br>

<button class="btn btn-dark" style="display: flex;justify-content: center;margin: auto;"><a style="color: white;" href="index.php?action=pageAjoutCasting">ADD Casting</a></button>

<?php

    foreach($castings as $casting){?>

<div class="card" style="display: flex;justify-content: center;margin: auto;width: 18rem;">
  <div class="card-body">
    <p class="card-text" style="text-align: center;"><?="Le rôle de <strong>" .$casting['role']. "</strong><br> a été interpreter par <br><strong>" .$casting['firstname']. " " .$casting['lastname']. "</strong><br>";?></p>
  </div>
</div>

<?php
    }
?>

<br><br><br><button class="btn btn-dark" style="display: flex;justify-content: center;margin: auto;"><a style="color: white;" href="index.php?action=delete&id=<?=$id?>">Delete Film</a></button>

<?php


$title = "détails du film";
$contenu = ob_get_clean(); 
require "View/layout.php";