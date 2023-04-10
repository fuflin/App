<?php

require_once "bdd/DAO.php";

class GenreController {

    public function findAll(){

        $dao = new DAO();

        $sql = "SELECT g.id_genre, g.libelle
        FROM genre AS g ";

        $films = $dao->executerRequete($sql); 
        
        require "View/genre/listGenre.php";
    }

    public function findOneById($id){

        $dao = new DAO();

        $sql = "SELECT m.title, g.libelle, g.id_genre
        FROM movie AS m
        INNER JOIN g_movie AS gm ON m.id_movie = gm.movie_id
        INNER JOIN genre AS g ON g.id_genre = gm.genre_id 
        WHERE id_genre = $id";

        $film = $dao->executerRequete($sql); 
        
        require "View/genre/detailGenre.php";
    }
}
?>