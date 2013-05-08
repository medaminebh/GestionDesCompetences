<?php

//include config
include("../../../../config/config.php");

if($_SESSION['c_user']->privilege != 0) {
    header("Location: index.html");
}

require_once "../../../../class/business/CatCompetence.php";


/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['submit'])) {
    $cat_competence = array();

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

    define('fromajax',true);
    define('forcatcompetence',true);

    //ComeptenceDAO.class.php requires
    require_once "../../../../class/business/CatCompetence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICatCompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $result = DAOFactory::getDAOFactory()->getCatCompetenceDAO()->insertCatCompetence($cat_competence);

    if($result){
        echo "1";
    }
    else{
        echo "0";
    }
}else{
    echo 'test';
    die();
}
?>
