<?php ob_start()?>

<h1>Bienvenue sur ma page genre</h1>

<?php

$film = $film->fetch();?>

    <h2><?=$film['libelle']?></h2>

<?php
    echo $film['title']."<br><br>";
    


?>

<?php

$title = "liste des genres";
$contenu = ob_get_clean(); 
require "View/layout.php";
