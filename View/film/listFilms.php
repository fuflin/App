<?php ob_start()?>

<h1>Bienvenue sur ma page film</h1>

<?php
while($film = $films->fetch()){?>

<div class="card" style="width: 18rem;">
  <img src="<?=$film['poster']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Titre</h5>
    <p class="card-text"><a href="index.php?action=detailFilm&id=<?=$film['id_movie']?>"><?=$film['title']?></a><br></p>
  </div>
</div>
    
    
<?php
}
?>

<button class="btn btn-dark"><a href="index.php?action=pageAjoutFilm">ADD Film</a></button>

<?php

$title = "liste des films";
$contenu = ob_get_clean(); 
require "View/layout.php";
