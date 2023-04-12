<?php ob_start() 
?>

<h1 style="text-align: center; color: white; margin-bottom: 30px">Liste des acteurs/actrices</h1>

<button class="btn btn-dark" style="display: flex;justify-content: center;margin: auto; margin-bottom: 30px"><a style="color: white;" href="index.php?action=pageAjoutActeur">ADD Acteur</a></button>

<div class="container" style="display: flex;flex-wrap: wrap;">

<?php while($acteur = $acteurs->fetch()){?>

    <div class="card" style="width: 20%; margin: 25px;">
      <img src="<?=$acteur['photo']?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Acteur</h5>
        <p class="card-text" style="text-align: center;"><a href="index.php?action=detailActeur&id=<?=$acteur['id_actor']?>"><?=$acteur['firstname']. " " .$acteur['lastname']?></a><br></p>
      </div>
    </div> 

<?php
}
?>

</div>



<?php

$title = "liste des acteurs";
$contenu = ob_get_clean();
require "View/layout.php";
