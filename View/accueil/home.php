<?php ob_start()
?>
<h1>Bienvenue sur ma page d'accueil</h1>




<?php

$title = "Accueil";
$contenu = ob_get_clean(); // temporisation de sortie

require "View/layout.php";