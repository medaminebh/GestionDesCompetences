<?php

//include config
include("../../../../config/config.php");

if($_SESSION['c_user']->privilege != 0) {
    header("Location: index.html");
}

require_once "../../../../class/business/Competence.php";


/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['submit'])) {
    $competence = array();

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

    define('fromajax',true);
    define('forcompetence',true);

    //ComeptenceDAO.class.php requires
    require_once "../../../../class/business/Competence.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/ICompetenceDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $result = DAOFactory::getDAOFactory()->getCompetenceDAO()->insertCompetence($competence);

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
