<?php

require_once "bdd/DAO.php";

class ActeurController {

    public function findAll(){

        $dao = new DAO();

        $sql = "SELECT a.firstname, a.lastname, a.birth_date, a.gender, a.id_actor, a.photo
        FROM actor AS a ";

        $acteurs = $dao->executerRequete($sql); 
        require "View/acteur/listActeurs.php";
    }

    public function findOneById($id){

        $dao = new DAO();

        $sql = "SELECT a.firstname, a.lastname, a.birth_date, a.id_actor, m.title, c.role, a.photo
        FROM actor AS a 
        INNER JOIN casting AS c ON a.id_actor = c.actor_id
        INNER JOIN movie AS m ON m.id_movie = c.movie_id
        WHERE id_actor = :id";

        $params = ['id' => $id]; 

        $acteur = $dao->executerRequete($sql, $params);
        $film = $dao->executerRequete($sql, $params);

        require "View/acteur/detailActeur.php";
    }

    public function addActeur(){

        if (isset($_POST['submit'])){

            $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $birth_date = filter_input(INPUT_POST, "birth_date", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "poster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($lastname&&$firstname&&$birth_date&&$gender&&$photo){

                $dao = new DAO();

                $sql = "INSERT INTO actor (firstname, lastname, birth_date, gender, photo) VALUES (:firstname, :lastname, :birth_date, :gender, :photo)";

                $params = ["firstname"=>$firstname, "lastname"=>$lastname, "birth_date"=>$birth_date, "gender"=>$gender, "photo"=>$photo];

                $acteurs = $dao->executerRequete($sql, $params); 

                require "View/acteur/ajouterActeur.php";
            }  
        }
    }
}
?>