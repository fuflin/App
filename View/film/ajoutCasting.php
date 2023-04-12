<?php ob_start()?>

<h1 style="text-align: center; color: white; margin-bottom: 30px;">Bienvenue sur la page Ajouter Casting</h1>


<h2 style="text-align: center; color: white; margin-bottom: 30px;">Ajouter un Casting</h2>

<form class="row g-3" action="index.php?action=ajoutFilm" method="post">
    <div class="col-md-6">
        <label for="poster" class="form-label" style="text-align: center; color: white;">Affiche</label>
        <input type="text" class="form-control" name="poster">
    </div>
    <div class="col-md-6">
        <label for="director_id" class="form-label" style="text-align: center; color: white;">Réalisateur</label>
        <select name="director_id" id="director_id">
            <option selected>Choisir...</option>
            <?php foreach($realisateurs->fetchAll() as $realisateur){ ?>
            <option value="<?=$realisateur['id_director']?>"><?=$realisateur['firstname']. " " .$realisateur['lastname']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="id_genre" class="form-label" style="text-align: center; color: white;">Genre</label>
        <select name="id_genre" id="id_genre">
            <option selected>Choisir...</option>
            <?php foreach($genres->fetchAll() as $genre){ ?>
            <option value="<?=$genre['id_genre']?>"><?=$genre['libelle']?></option>
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