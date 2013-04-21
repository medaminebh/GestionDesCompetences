<?php

//include config
include("../../../../config/config.php");

if($_SESSION['c_user']->privilege != 0) {
    header("Location: index.html");
}

require_once "../../../../class/business/Competence.php";

if (isset($_COOKIE['comptoedit']) && is_numeric($_COOKIE['comptoedit']) && intval($_COOKIE['comptoedit']) > 0) {

    $competence = new Competence(array('id_competence' => htmlspecialchars(intval($_COOKIE['comptoedit']))));
    setcookie('comptoedit', null, -3600, '/');
    unset($_COOKIE['comptoedit']);

    define('fromajax', true);
    define('forcompetence',true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/Competence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $competence = DAOFactory::getDAOFactory()->getCompetenceDAO()->selectCompetence($competence);
    if ($competence) {
        header("Content-type: text/xml");
        echo "<?xml version='1.0' encoding='utf-8'?>\n";
        echo "<competences>\n";
        echo "<competence>\n";
        echo "<competence_id>" . $competence->id_competence . "</competence_id>";
        echo "<competence_nom>" . $competence->nom_competence . "</competence_nom>";
        echo "<competence_description>" . $competence->description_competence . "</competence_description>";
        echo "</competence>\n";
        echo "</competences>\n";
    }
} else if (isset($_POST['submit'])) {
    $competence = array();

    if (isset($_POST['id_competence']) && is_numeric($_POST['id_competence']) && intval($_POST['id_competence']) > 0) {
        $competence['id_competence'] = intval($_POST['id_competence']);
    } else {
        echo "id_competence";
        die();
    }

    if(isset($_POST['nom_competence'])){
       $competence['nom_competence'] = $_POST['nom_competence'];
    }else{
        echo "nom_competence";
        die();
    }

    if(isset($_POST['description_competence'])){
       $competence['description_competence'] = $_POST['description_competence'];
    }else{
        echo "description_competence";
        die();
    }

    $competence = new Competence($competence);

    define('fromajax', true);
    define('forcompetence',true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/Competence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $result = DAOFactory::getDAOFactory()->getCompetenceDAO()->updateCompetence($competence);

    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    die();
}
?>
