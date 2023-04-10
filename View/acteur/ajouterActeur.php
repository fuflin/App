<?php ob_start()?>

<h1>Bienvenue sur la page Ajouter acteur</h1>

<div>
    <h2>Ajouter Acteur</h2>
    <form action="index.php?action=ajoutActeur" method="post">
            <div class="">
                <!-- champ pour le nom de l'acteur -->
                <div class="">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="lastname">
                </div>
                <!-- champ pour le prénom de l'acteur-->
                <div class="">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <!-- champ pour la date de naissance-->
                <div class="">
                    <label for="birth_date" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" name="birth_date">
                </div>
                <!-- champ pour le sexe-->
                <div class="">
                    <label for="gender" class="form-label">Sexe</label>
                    <input type="text" class="form-control" name="gender">
                </div>
            </div>
            <!-- bouton pour ajouter l'acteur saisie -->
            <div class="">
                <input type="submit" class="btn btn-secondary w-50" name="submit" value="Ajouter">
            </div>
        </form>
</div>

<?php

$title = "Ajouter acteur";
$contenu = ob_get_clean(); 
require "View/layout.php";