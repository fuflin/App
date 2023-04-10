<?php ob_start()?>

<h1>Bienvenue sur la page Ajouter</h1>

<div>
    <h2>Ajouter Film</h2>
    <form action="index.php?action=ajoutFilm" method="post">
            <div class="">
                
                <div class="">
                    <label for="poster" class="form-label">Affiche</label>
                    <input type="text" class="form-control" name="poster">
                </div>
                <div class="">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="">
                    <label for="director_id" class="form-label">Réalisateur</label>
                    <select name="director_id" id="director_id">
                        <?php foreach($realisateurs->fetchAll() as $realisateur){ ?>
                        <option value="<?=$realisateur['id_director']?>"><?=$realisateur['firstname']. " " .$realisateur['lastname']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="">
                    <label for="id_genre" class="form-label">Genre</label>
                    <select name="id_genre" id="id_genre">
                        <?php foreach($genres->fetchAll() as $genre){ ?>
                        <option value="<?=$genre['id_genre']?>"><?=$genre['libelle']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="">
                    <label for="duration" class="form-label">Durée</label>
                    <input type="int" class="form-control" name="duration">
                </div>
                
                <div class="">
                    <label for="release_date_fr" class="form-label">Date de sortie</label>
                    <input type="date" class="form-control" name="release_date_fr">
                </div>
                
                <div class="">
                    <label for="note" class="form-label">Note</label>
                    <input type="float" class="form-control" name="note">
                </div>
                <div class="">
                    <label for="synopsis" class="form-label">Résumé</label>
                    <input type="text" class="form-control" name="synopsis">
                </div>
            </div>
            <div class="">
                <input type="submit" class="btn btn-secondary w-50" name="submit" value="Ajouter">
            </div>
        </form>
</div>

<?php

$title = "Ajouter film";
$contenu = ob_get_clean(); 
require "View/layout.php";