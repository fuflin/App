<?php ob_start()?>

<h1 style="text-align: center; color: white; margin-bottom: 30px;">Bienvenue sur la page Ajouter Casting</h1>

<h2 style="text-align: center; color: white; margin-bottom: 30px;">Ajouter un Casting</h2>

<form class="col" action="index.php?action=ajoutCasting" method="post">
<div>
    <div class="col-md-4" style="margin: auto;">
        <label for="role" class="form-label" style="text-align: center; color: white;">Role</label>
        <input type="text" class="form-control" name="role">
    </div>
    <div class="col-md-4" style="margin: auto;">
        <label for="id_actor" class="form-label" style="text-align: center; color: white;">Acteur</label>
        <select name="id_actor" id="id_actor">
            <option selected>Choisir...</option>
            <?php foreach($acteurs->fetchAll() as $acteur){ ?>
            <option value="<?=$acteur['id_actor']?>"><?=$acteur['firstname']. " " .$acteur['lastname']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-4" style="margin: auto;">
        <label for="id_movie" class="form-label" style="text-align: center; color: white;">Film</label>
        <select name="id_movie" id="id_movie">
            <option selected>Choisir...</option>
            <?php foreach($films->fetchAll() as $film){ ?>
            <option value="<?=$film['id_movie']?>"><?=$film['title']?></option>
            <?php } ?>
        </select>
    </div>
</div>
    <div class="col-12" style="display: flex;justify-content: center;">
        <input type="submit" class="btn btn-primary w-50" name="submit" value="Ajouter">
    </div>
</form>

<?php

$title = "Ajouter casting";
$contenu = ob_get_clean(); 
require "View/layout.php";

