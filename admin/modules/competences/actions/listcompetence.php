<?php

    //include config
    include("../../../../config/config.php");

    if($_SESSION['c_user']->privilege != 0) {
        header("Location: index.html");
    }
    
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    require_once "../../../../class/business/Competence.php";

    $comeptences_filtre = new Competence(null);

    define('fromajax',true);
    define('forcompetence',true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/Competence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICompetenceDAO.interface.php";

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
    
    $competences = DAOFactory::getDAOFactory()->getCompetenceDAO()->selectCompetences($comeptences_filtre, $limit);
    header("Content-type: text/xml");
    echo "<?xml version='1.0' encoding='utf-8'?>\n";
    echo "<competences total=\"".count(DAOFactory::getDAOFactory()->getCompetenceDAO()->selectCompetences($comeptences_filtre, ""))."\">\n";
    foreach ($competences as $competence){
        echo "<competence>\n";
            echo "<competence_id>".$competence["id_competence"]."</competence_id>";
            echo "<competence_nom>".$competence["nom_competence"]."</competence_nom>";
            echo "<competence_description>".$competence["description_competence"]."</competence_description>";
        echo "</competence>\n";
     }
     echo "</competences>\n";
?>
