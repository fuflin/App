<?php ob_start() ?>

<h1>Bienvenue sur ma page détail genre</h1>

<?php

while($film = $films->fetch()){?>

    <a href="index.php?action=detailGenre&id=<?=$film['id_genre']?>"><?=$film['libelle']?><br></a>
    <?php
    
    
}

?>


<?php

$title = "Films par genre";
$contenu = ob_get_clean();
require "View/layout.php";
