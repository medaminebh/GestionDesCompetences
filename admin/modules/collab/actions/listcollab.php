<?php

    //include config
    include("../../../../config/config.php");

    if($_SESSION['c_user']->privilege != 0) {
        header("Location: index.html");
    }
    
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    require_once "../../../../class/business/User.php";

    $users_filtre = new User(array('privilege' => 2));
    define('fromajax',true);
    define('foruser', true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/User.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/IUserDAO.interface.php";

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
    
    $collabs = DAOFactory::getDAOFactory()->getUserDAO()->selectUsers($users_filtre, $limit);
    header("Content-type: text/xml");
    echo "<?xml version='1.0' encoding='utf-8'?>\n";
    echo "<collabs total=\"".count(DAOFactory::getDAOFactory()->getUserDAO()->selectUsers($users_filtre, ""))."\">\n";
    foreach ($collabs as $collab){
        echo "<collab>\n";
            echo "<collab_id>".$collab["id_user"]."</collab_id>";
            echo "<collab_nom>".$collab["nom_user"]."</collab_nom>";
            echo "<collab_prenom>".$collab["prenom_user"]."</collab_prenom>";
            echo "<collab_genre>".$collab["genre"]."</collab_genre>";
            echo "<collab_email>".$collab["email"]."</collab_email>";
            echo "<collab_hire_date>".$collab["hire_date"]."</collab_hire_date>";
            echo "<collab_last_login>".$collab["last_login"]."</collab_last_login>";
            echo "<collab_expire_date>".$collab["expire_date"]."</collab_expire_date>";
            echo "<collab_state>".(($collab["active"] == 1) ? "actived" : "inativated")."</collab_state>";
        echo "</collab>\n";
     }
     echo "</collabs>\n";
?>