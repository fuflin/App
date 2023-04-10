<?php ob_start() 
?>
<h1>Bienvenue sur ma page realisateur</h1>



<?php
while($realisateur = $realisateurs->fetch()){

?>
<div class="card" style="width: 18rem;">
  <img src="<?=$realisateur['photo'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Réalisateur</h5>
    <p class="card-text"><a href="index.php?action=detailReal&id=<?=$realisateur['id_director']?>"><?=$realisateur['firstname']. " " .$realisateur['lastname']?></a><br></p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>


<?php

}
?>

<button class="btn btn-dark"><a href="index.php?action=pageAjoutRealisateur">ADD Realisateur</a></button>

<?php


$title = "liste des realisateurs";
$contenu = ob_get_clean();
require "View/layout.php";
