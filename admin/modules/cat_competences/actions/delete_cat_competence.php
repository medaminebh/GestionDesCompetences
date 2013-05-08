<?php

    //include config
    include("../../../../config/config.php");

    if($_SESSION['c_user']->privilege != 0) {
        header("Location: index.html");
    }

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    if (isset($_POST['id'])&& !empty($_POST['id'])) {
        $ids = explode("-", htmlspecialchars($_POST['id']), 8);

        require_once "../../../../class/business/CatCompetence.php";

        define('fromajax',true);
        define('forcatcompetence',true);

        //CatComepetenceDAO.class.php requires
        require_once "../../../../class/business/CatCompetence.php";
        require_once "../../../../lib/functions.php";
        require_once "../../../../class/dao/ICatCompetenceDAO.interface.php";

        //DAOFactroy.class.php requires
        require_once "../../../../class/technique/Singleton.class.php";

        require_once "../../../../class/dao/DAOFactory.class.php";

        foreach ($ids as $id) {
            $cat_competence = new Competence(array('id_cat_competence' => $id));
            $exist = DAOFactory::getDAOFactory()->getCatCompetenceDAO()->findCatCompetence($cat_competence);
            if($exist){
                $deleted = DAOFactory::getDAOFactory()->getCatCompetenceDAO()->deleteCatCompetence($cat_competence);
                if(!$deleted) {
                    die();
                }
            } else {
                echo "0";
                die();
            }
        }
        echo "1";
    }
?>
