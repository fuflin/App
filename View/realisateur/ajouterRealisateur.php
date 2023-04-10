<?php ob_start()?>

<h1>Bienvenue sur la page Ajouter Réalisateur</h1>

<div>
    <h2>Ajouter Réalisateur</h2>
    <form action="index.php?action=ajoutReal" method="post">
        <div class="">
            <!-- champ pour le nom du réalisateur -->
            <div class="">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <!-- champ pour le prénom du réalisateur-->
            <div class="">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
        </div>
        <!-- bouton pour ajouter le réalisateur saisie -->
        <div class="">
            <input type="submit" class="btn btn-secondary w-50" name="submit" value="Ajouter">
        </div>
    </form>
</div>

<?php

$title = "Ajouter realisateur";
$contenu = ob_get_clean(); 
require "View/layout.php";