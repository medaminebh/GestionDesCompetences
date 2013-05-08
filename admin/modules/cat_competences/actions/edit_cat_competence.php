<?php

//include config
include("../../../../config/config.php");

if($_SESSION['c_user']->privilege != 0) {
    header("Location: index.html");
}

require_once "../../../../class/business/CatCompetence.php";

if (isset($_COOKIE['cat_comptoedit']) && is_numeric($_COOKIE['cat_comptoedit']) && intval($_COOKIE['cat_comptoedit']) > 0) {

    $cat_competence = new CatCompetence(array('id_cat_competence' => htmlspecialchars(intval($_COOKIE['cat_comptoedit']))));
    setcookie('cat_comptoedit', null, -3600, '/');
    unset($_COOKIE['cat_comptoedit']);

    define('fromajax', true);
    define('forcatcompetence',true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/CatCompetence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICatCompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $cat_competence = DAOFactory::getDAOFactory()->getCatCompetenceDAO()->selectCatCompetence($cat_competence);
    if ($cat_competence) {
        header("Content-type: text/xml");
        echo "<?xml version='1.0' encoding='utf-8'?>\n";
        echo "<cat_competences>\n";
        echo "<cat_competence>\n";
        echo "<cat_competence_id>" . $cat_competence->id_cat_competence . "</cat_competence_id>";
        echo "<cat_competence_nom>" . $cat_competence->nom_cat_competence . "</cat_competence_nom>";
        echo "<cat_competence_description>" . $cat_competence->description_cat_competence . "</cat_competence_description>";
        echo "</cat_competence>\n";
        echo "</cat_competences>\n";
    }
} else if (isset($_POST['submit'])) {
    $cat_competence = array();

    if (isset($_POST['id_cat_competence']) && is_numeric($_POST['id_cat_competence']) && intval($_POST['id_cat_competence']) > 0) {
        $cat_competence['id_cat_competence'] = intval($_POST['id_cat_competence']);
    } else {
        echo "id_cat_competence";
        die();
    }

    if(isset($_POST['nom_cat_competence'])){
       $cat_competence['nom_cat_competence'] = $_POST['nom_cat_competence'];
    }else{
        echo "nom_cat_competence";
        die();
    }

    if(isset($_POST['description_cat_competence'])){
       $cat_competence['description_cat_competence'] = $_POST['description_cat_competence'];
    }else{
        echo "description_cat_competence";
        die();
    }

    $cat_competence = new CatCompetence($cat_competence);

    define('fromajax', true);
    define('forcatcompetence',true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/CatCompetence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICatCompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $result = DAOFactory::getDAOFactory()->getCatCompetenceDAO()->updateCatCompetence($cat_competence);

    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    die();
}
?>
