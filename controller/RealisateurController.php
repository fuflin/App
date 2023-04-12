<?php

require_once "bdd/DAO.php";
require_once "controller/FilmController.php";
require_once "controller/AccueilController.php";

class RealisateurController {

    public function findAll(){

        $dao = new DAO();

        $sql = "SELECT d.firstname, d.lastname, d.id_director, d.photo
        FROM director AS d ";

        $realisateurs = $dao->executerRequete($sql); 
        require "View/realisateur/listRealisateurs.php";
    }

    public function findOneById($id){

        $dao = new DAO();

        $sql = "SELECT d.firstname, d.lastname, d.id_director, m.title, d.photo
        FROM movie AS m
        INNER JOIN director AS d ON m.director_id = d.id_director
        WHERE d.id_director = $id";

        $realisateur = $dao->executerRequete($sql);
        $film = $dao->executerRequete($sql); 

        require "View/realisateur/detailReal.php";
    }

    public function addReal(){

        if (isset($_POST['submit'])){

            $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "poster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($lastname&&$firstname&&$photo){

                $dao = new DAO();

                $sql = "INSERT INTO director (firstname, lastname, photo) VALUES (:firstname, :lastname, :photo)";

                $params = ["firstname"=>$firstname, "lastname"=>$lastname, "photo"=>$photo];

                $dao->executerRequete($sql, $params); 
                
                require "View/realisateur/ajouterRealisateur.php";
            }  
        }
    }
}
?>