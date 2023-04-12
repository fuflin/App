<?php ob_start() 
?>
<h1 style="text-align: center; color: white; margin-bottom: 30px;">Liste des réalisateurs</h1>

<button class="btn btn-dark" style="display: flex;justify-content: center; margin: auto; margin-bottom: 30px;"><a style="color: white;" href="index.php?action=pageAjoutRealisateur">ADD Realisateur</a></button>


<div class="container" style="display: flex;flex-wrap: wrap;">

<?php while($realisateur = $realisateurs->fetch()){ ?>

    <div class="card" style="width: 29%; margin: 25px;">
      <img src="<?=$realisateur['photo'];?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Réalisateur</h5>
        <p class="card-text" style="text-align: center;"><a href="index.php?action=detailReal&id=<?=$realisateur['id_director']?>"><?=$realisateur['firstname']. " " .$realisateur['lastname']?></a><br></p>
      </div>
    </div>

<?php
}
?>

</div><br><br><br>


<?php


$title = "liste des realisateurs";
$contenu = ob_get_clean();
require "View/layout.php";
