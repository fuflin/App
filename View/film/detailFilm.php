<?php ob_start() ?>

<h1>Bienvenue sur ma page detail film</h1>

<?php

$film = $film->fetch();
$realisateur = $realisateur->fetch();
$genre = $genre->fetch();
$castings = $castings->fetchAll();

$date = new DateTime($film['release_date_fr']);

?>

<div class="card" style="width: 18rem;">
  <img src="<?=$film['poster']?>" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Détail du film</h5>
    <p class="card-text"><?php
    echo "Titre du film: " .$film['title']. "<br>";
    echo "Réalisateur du film: ". $realisateur['firstname']. " " .$realisateur['lastname']. "<br>";
    echo "Genre du film: " .$genre['libelle']. "<br>";
    echo "Durée du film: " .$film['duration']. "min <br>";
    echo "Note: " .$film['note']. "/5 <br>";
    echo "Date de sortie: " .date_format($date, "d F Y"). "<br>";
    echo "Résumé du film: <br>" .$film['synopsis']. "<br>";?></p>
  </div>
</div>

<h2>Casting du film</h2>

<?php

    foreach($castings as $casting){

        echo "Le rôle de " .$casting['role']. " a été interpreter par " .$casting['firstname']. " " .$casting['lastname']. "<br>";
    }
?>

<button class="btn btn-dark"><a href="index.php?action=delete&id=<?=$id?>">Delete Film</a></button>

<?php


$title = "détails du film";
$contenu = ob_get_clean(); 
require "View/layout.php";