<?php 
// je demande le fichier physique ou j'utilise un autoloader

require_once "controller/FilmController.php"; 
require_once "controller/ActeurController.php"; 
require_once "controller/AccueilController.php";
require_once "controller/RealisateurController.php";
require_once "controller/GenreController.php";


// j'instancie les controlleurs 
$ctrlFilm = new FilmController();
$ctrlAccueil = new AccueilController();
$ctrlActeur = new ActeurController(); 
$ctrlRealisateur = new RealisateurController();
$ctrlGenre = new GenreController();


// je switch entre difféents case 
// si j'ai une "action" dans l'URL , cette action donnera accès à un controlleur et à la fonction demandée (si elle existe) 
if(isset($_GET['action'])){ 
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
   // car possible d'injecter du code malveillant dans l'URL 
  switch($_GET['action'])
  { 
    // case pour l'affichage total de chaque catégories
    case "listFilms" : 
      $ctrlFilm->findAll(); 
    break; 
    
    case "listRealisateurs" : 
      $ctrlRealisateur->findAll(); 
    break; 
    
    case "listGenre" : 
      $ctrlGenre->findAll(); 
    break; 
    
    case "listActeurs" : 
      $ctrlActeur->findAll(); 
    break; 

    // case pour l'affichage des détails d'un élément spécifique
    case "detailFilm" : 
      $ctrlFilm->findOneById($id); 
    break; 
  
    case "detailGenre" : 
      $ctrlGenre->findOneById($id); 
    break; 

    case "detailReal" :
      $ctrlRealisateur->findOneById($id);
    break;
    
    case "detailActeur" :
      $ctrlActeur->findOneById($id);
    break;

    // case pour les différents ajouts
    case "ajoutReal" :
      $ctrlRealisateur->addReal();
    break;

    case "ajoutFilm" :
      $ctrlFilm->addFilm();
    break;

    case "ajoutActeur" :
      $ctrlActeur->addActeur();
    break;

    case "pageAjoutActeur" : 
      $ctrlAccueil->pageAjoutActeur(); 
    break;

    case "pageAjoutRealisateur" : 
      $ctrlAccueil->pageAjoutRealisateur(); 
    break;

    case "pageAjoutFilm" :
      $ctrlAccueil->pageAjoutFilm();
    break;

    case "pageAcceuil" : 
      $ctrlAccueil->pageAccueil(); 
    break;

    case "delete" :
      $ctrlFilm->delete($id);
    break;

  }} else { 

    $ctrlAccueil->pageAccueil(); }
    // ma page par défault si l'action demandée n'est pas trouvée