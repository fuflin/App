<?php ob_start()?>

<h1 style="text-align: center; color: white; margin-bottom: 30px;">Bienvenue sur la page Ajouter Casting</h1>


<h2 style="text-align: center; color: white; margin-bottom: 30px;">Ajouter un Casting</h2>

<form class="row g-3" action="index.php?action=ajoutFilm" method="post">
    <div class="col-md-6">
        <input type="hidden" name="movie_id" value="<?=$_GET['movie_id']?>">
    </div>
    <div class="col-md-6">
        <label for="poster" class="form-label" style="text-align: center; color: white;">Role</label>
        <input type="text" class="form-control" name="poster">
    </div>
    
    <div class="col-md-6">
        <label for="id_genre" class="form-label" style="text-align: center; color: white;">Acteur</label>
        <select name="id_genre" id="id_genre">
            <option selected>Choisir...</option>
            <?php foreach($castings->fetchAll() as $casting){ ?>
            <option value="<?=$casting['actor_id']?>"><?=$casting['firstname']. " " .$casting['lastname']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-12" style="display: flex;justify-content: center;">
        <input type="submit" class="btn btn-primary w-50" name="submit" value="Ajouter">
    </div>
</form>


<?php

$title = "Ajouter casting";
$contenu = ob_get_clean(); 
require "View/layout.php";