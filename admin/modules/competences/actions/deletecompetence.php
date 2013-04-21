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

        require_once "../../../../class/business/Competence.php";

        define('fromajax',true);
        define('forcompetence',true);

        //UserDAO.class.php requires
        require_once "../../../../class/business/Competence.php";
        require_once "../../../../lib/functions.php";
        require_once "../../../../class/dao/ICompetenceDAO.interface.php";

        //DAOFactroy.class.php requires
        require_once "../../../../class/technique/Singleton.class.php";

        require_once "../../../../class/dao/DAOFactory.class.php";

        foreach ($ids as $id) {
            $competence = new Competence(array('id_competence' => $id));
            $exist = DAOFactory::getDAOFactory()->getCompetenceDAO()->findCompetence($competence);
            if($exist){
                $deleted = DAOFactory::getDAOFactory()->getCompetenceDAO()->deleteCompetence($competence);
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
