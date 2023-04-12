<?php ob_start()
?>
<h1 style="text-align: center; color: white;">Bienvenue sur ma page d'accueil</h1>




<?php

$title = "Accueil";
$contenu = ob_get_clean();

require "View/layout.php";