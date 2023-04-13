<?php

require_once "bdd/DAO.php";
require_once "controller/FilmController.php";
require_once "controller/RealisateurController.php";


class AccueilController {

    public function pageAccueil(){

        require "View/accueil/home.php";
    }

    public function pageAjoutActeur(){

        require "View/acteur/ajouterActeur.php";
    }

    public function pageAjoutRealisateur(){

        require "View/realisateur/ajouterRealisateur.php";
    }

    public function pageAjoutFilm(){
        
           $dao = new DAO();

                $sql = "SELECT firstname, lastname, id_director
                FROM director AS d, movie AS m
                WHERE m.director_id = d.id_director";

                $realisateurs = $dao->executerRequete($sql);
                
                $sql = "SELECT *
                FROM genre g";

                $genres = $dao->executerRequete($sql);

        require "View/film/ajoutFilm.php";
    }

    public function pageAjoutCasting(){
        
        $dao = new DAO();

             $sql = "SELECT DISTINCT firstname, lastname, id_actor
             FROM actor AS a, casting AS c
             WHERE c.actor_id = a.id_actor";

             $acteurs = $dao->executerRequete($sql);
             
             $sql2 = "SELECT DISTINCT m.title, m.id_movie
             FROM movie m";

             $films = $dao->executerRequete($sql2);

     require "View/film/ajouterCasting.php";
    }

}