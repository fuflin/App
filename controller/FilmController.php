<?php

require_once "bdd/DAO.php";
require_once "controller/AccueilController.php";

class FilmController {

    public function findAll(){

        $dao = new DAO();

        $sql = "SELECT m.id_movie, m.title, m.poster
        FROM movie AS m ";

        $films = $dao->executerRequete($sql); 
        require "View/film/listFilms.php";
    }

    public function findOneById($id){

        $dao = new DAO();

        $sql = "SELECT DISTINCT m.title, m.release_date_fr, m.duration, m.poster, m.note, m.synopsis
        FROM movie AS m
        INNER JOIN director AS d ON d.id_director = m.director_id
        WHERE id_movie = :id";

        $sql1 = "SELECT DISTINCT d.firstname, d.lastname
        FROM director AS d
        INNER JOIN movie AS m ON d.id_director = m.director_id
        ";

        $sql2 = "SELECT DISTINCT c.role, a.firstname, a.lastname, m.title
        FROM casting AS c 
        INNER JOIN movie AS m ON m.id_movie = c.movie_id
        INNER JOIN actor AS a ON a.id_actor = c.actor_id
        WHERE movie_id = :id";
        
        $sql3 = "SELECT DISTINCT g.libelle, m.title
        FROM genre AS g 
        INNER JOIN g_movie AS gm ON gm.genre_id = g.id_genre
        INNER JOIN movie AS m ON m.id_movie = gm.movie_id
        ";

        $sql4 = "SELECT DISTINCT c.role, a.firstname, a.lastname, a.birth_date
        FROM actor AS a
        INNER JOIN casting AS c ON a.id_actor = c.actor_id
        ";

        $params = ['id' => $id]; // paramètre pour les requêtes prepare et execute

        $film = $dao->executerRequete($sql, $params); 
        $realisateur = $dao->executerRequete($sql1);
        $castings = $dao->executerRequete($sql2, $params);
        $genre = $dao->executerRequete($sql3);
        $acteur = $dao->executerRequete($sql4);

        require "View/film/detailFilm.php";
    }

    public function addFilm(){

        if (isset($_POST['submit'])){

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST, "duration", FILTER_SANITIZE_NUMBER_INT);
            $release_date_fr = $_POST['release_date_fr'];
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $poster = filter_input(INPUT_POST, "poster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $director_id = $_POST['director_id'];

            if($title&&$duration&&$release_date_fr&&$note&&$synopsis&&$poster&&$director_id){

                $dao = new DAO();

                $sql = "INSERT INTO movie (title, duration, release_date_fr, note, synopsis, poster, director_id) 
                VALUES (:title, :duration, :release_date_fr, :note, :synopsis, :poster, :director_id)";

                $params = [
                    "title" => $title,
                    "duration" => $duration,
                    "release_date_fr" => $release_date_fr,
                    "note" => $note,
                    "synopsis" => $synopsis,
                    "poster" => $poster,
                    "director_id" => $director_id
                ];

                $films = $dao->executerRequete($sql, $params); 

                $id_genre = $_POST['id_genre'];

                $sql = "INSERT INTO g_movie (genre_id, movie_id) VALUES (:genre_id, LAST_INSERT_ID())";

                $params = ["genre_id" => $id_genre];

                $genres = $dao->executerRequete($sql, $params);

                require "View/film/ajoutFilm.php";
            }
        }

        header("location:index.php?action=listFilms");
    }

    public function addCasting(){

        if (isset($_POST['submit'])){

            $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_acteur = $_POST['actor_id'];
            $id_movie = $_POST['movie_id'];

            if($role&&$id_acteur&&$id_movie){

                $dao = new DAO();

                $sql = "INSERT INTO casting (role, actor_id, movie_id) VALUES (:role, :actor_id, :movie_id)";

                $params = ["role"=>$role, "actor_id"=>$id_acteur, "movie_id"=>$id_movie];

                $castings = $dao->executerRequete($sql, $params); 

                require "View/acteur/ajoutCasting.php";
            }  
        }
    }

    public function delete($id){

        $id = $_GET['id']; // récupération de l'id du film à supprimer

        $dao = new DAO();

            $sql = "DELETE  
            FROM g_movie
            WHERE movie_id = :id";

            $sql2 = "DELETE 
            FROM movie
            WHERE id_movie = :id"; 

            $params = ['id' => $id];

        $films = $dao->executerRequete($sql, $params);
        $films = $dao->executerRequete($sql2, $params);

        header("location:index.php?action=listFilms");

    }
}
?>