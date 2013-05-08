<?php

    //include config
    include("../../../../config/config.php");

    if($_SESSION['c_user']->privilege != 0) {
        header("Location: index.html");
    }
    
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    require_once "../../../../class/business/CatCompetence.php";

    $cat_comeptences_filtre = new CatCompetence(null);

    define('fromajax',true);
    define('forcatcompetence',true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/CatCompetence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICatCompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    
    if(isset($_GET['begin']) && is_numeric($_GET['begin']) && isset($_GET['limit']) && is_numeric($_GET['limit'])){
    $begin = $_GET['begin'];
    $limit = $_GET['limit'];
    $limit = " LIMIT $begin, $limit";
    }else {
        $limit = "";
    }
    
    $cat_competences = DAOFactory::getDAOFactory()->getCatCompetenceDAO()->selectCatCompetences($cat_comeptences_filtre, $limit);
    header("Content-type: text/xml");
    echo "<?xml version='1.0' encoding='utf-8'?>\n";
    echo "<cat_competences total=\"".count(DAOFactory::getDAOFactory()->getCatCompetenceDAO()->selectCatCompetences($cat_comeptences_filtre, ""))."\">\n";
    foreach ($cat_competences as $cat_competence){
        echo "<cat_competence>\n";
            echo "<cat_competence_id>".$cat_competence["id_cat_competence"]."</cat_competence_id>";
            echo "<cat_competence_nom>".$cat_competence["nom_cat_competence"]."</cat_competence_nom>";
            echo "<cat_competence_description>".$cat_competence["description_cat_competence"]."</cat_competence_description>";
        echo "</cat_competence>\n";
     }
     echo "</cat_competences>\n";
?>
