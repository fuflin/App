<?php ob_start() 
?>
<h1>Bienvenue sur ma page liste acteur</h1>
<?php
while($acteur = $acteurs->fetch()){?>

<div class="card" style="width: 18rem;">
  <img src="<?=$acteur['photo']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Acteur</h5>
    <p class="card-text"><a href="index.php?action=detailActeur&id=<?=$acteur['id_actor']?>"><?=$acteur['firstname']. " " .$acteur['lastname']?></a><br></p>
  </div>
</div>
    

<?php
}

?>
<button class="btn btn-dark"><a href="index.php?action=pageAjoutActeur">ADD Acteur</a></button>
<?php

$title = "liste des acteurs";
$contenu = ob_get_clean();
require "View/layout.php";
