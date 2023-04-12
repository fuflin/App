<?php ob_start()?>

<h1 style="text-align: center; color: white; margin-bottom: 30px">Listes des Films</h1>

<button class="btn btn-dark" style="display: flex;justify-content: center;margin: auto;"><a style="color: white;" href="index.php?action=pageAjoutFilm">ADD Film</a></button>

<div class="container" style="display: flex;flex-wrap: wrap;">

<?php while($film = $films->fetch()){ ?>

  <div class="card" style="background-image: url('https://i.pinimg.com/originals/c9/6d/09/c96d09dd9e2ac87f10301cb40f94e8d3.jpg'); width: 29%; margin: 25px; ">
    <img src="<?=$film['poster']?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title" style = "text-align: center; color: white;">Titre</h5>
      <p class="card-text" style="text-align: center; "><a style="color: white;" href="index.php?action=detailFilm&id=<?=$film['id_movie']?>"><?=$film['title']?></a><br></p>
    </div>
  </div>


<?php
}
?>

<?php

$title = "liste des films";
$contenu = ob_get_clean(); 
require "View/layout.php";
