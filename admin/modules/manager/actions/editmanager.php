<?php

//include config
include("../../../../config/config.php");

if($_SESSION['c_user']->privilege != 0) {
    header("Location: index.html");
}

require_once "../../../../class/business/User.php";

if (isset($_COOKIE['usertoedit']) && is_numeric($_COOKIE['usertoedit']) && intval($_COOKIE['usertoedit']) > 0) {

    $user = new User(array('id_user' => htmlspecialchars(intval($_COOKIE['usertoedit']))));
    setcookie('usertoedit', null, -3600, '/');
    unset($_COOKIE['usertoedit']);

    define('fromajax', true);
    define('foruser', true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/User.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/IUserDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $collab = DAOFactory::getDAOFactory()->getUserDAO()->selectUser($user);
    if ($collab) {
        header("Content-type: text/xml");
        echo "<?xml version='1.0' encoding='utf-8'?>\n";
        echo "<collabs>\n";
        echo "<collab>\n";
        echo "<collab_id_user>" . $collab->id_user . "</collab_id_user>";
        echo "<collab_login>" . $collab->login . "</collab_login>";
        echo "<collab_pwd>" . $collab->pwd . "</collab_pwd>";
        echo "<collab_email>" . $collab->email . "</collab_email>";
        echo "<collab_id_service>" . $collab->id_service . "</collab_id_service>";
        echo "<collab_privilege>" . $collab->privilege . "</collab_privilege>";
        echo "<collab_state>" . $collab->active . "</collab_state>";
        echo "<collab_nom>" . $collab->nom_user . "</collab_nom>";
        echo "<collab_prenom>" . $collab->prenom_user . "</collab_prenom>";
        echo "<collab_genre>" . $collab->genre . "</collab_genre>";
        echo "<collab_date_naiss>" . $collab->date_naiss . "</collab_date_naiss>";
        echo "<collab_etat_civil>" . $collab->etat_civil . "</collab_etat_civil>";
        echo "<collab_adresse>" . $collab->adresse . "</collab_adresse>";
        echo "<collab_tel_mobile>" . $collab->tel_mobile . "</collab_tel_mobile>";
        echo "<collab_diplome>" . $collab->diplome . "</collab_diplome>";
        echo "<collab_annee_dip>" . $collab->annee_dip . "</collab_annee_dip>";
        echo "<collab_expire_date>" . date("Y-m-d", strtotime($collab->expire_date)) . "</collab_expire_date>";
        echo "</collab>\n";
        echo "</collabs>\n";
    }
} else if (isset($_POST['submit'])) {
    $user = array();

    if (isset($_POST['id_user']) && is_numeric($_POST['id_user']) && intval($_POST['id_user']) > 0) {
        $user['id_user'] = intval($_POST['id_user']);
    } else {
        echo "id_user";
        die();
    }
    
    if (isset($_POST['login'])) {
        $user['login'] = $_POST['login'];
    } else {
        echo "login";
        die();
    }

    if (isset($_POST['pwd1']) && isset($_POST['pwd2']) && ($_POST['pwd1'] == $_POST['pwd2'])) {
        $user['pwd'] = $_POST['pwd1'];
    } else {
        echo "pwd";
        die();
    }

    if (isset($_POST['email'])) {
        $user['email'] = $_POST['email'];
    } else {
        echo "email";
        die();
    }

    if (isset($_POST['nom'])) {
        $user['nom_user'] = $_POST['nom'];
    } else {
        echo "nom";
        die();
    }

    if (isset($_POST['prenom'])) {
        $user['prenom_user'] = $_POST['prenom'];
    } else {
        echo "prenom";
        die();
    }

    if (isset($_POST['genre'])) {
        $user['genre'] = $_POST['genre'];
    } else {
        echo "genre";
        die();
    }

    if (isset($_POST['id-service']) && is_numeric($_POST['id-service']) && intval($_POST['id-service']) > 0) {
        $user['id_service'] = intval($_POST['id-service']);
    } else {
        echo "id-service";
        die();
    }

    if (isset($_POST['privilege']) && is_numeric($_POST['privilege']) && intval($_POST['privilege']) >= 0 && intval($_POST['privilege']) <= 2) {
        $user['privilege'] = intval($_POST['privilege']);
    } else {
        echo "privilege";
        die();
    }

    if (isset($_POST['date_naiss'])) {
        $user['date_naiss'] = $_POST['date_naiss'];
    } else {
        echo "date_naiss";
        die();
    }

    if (isset($_POST['etat_civil'])) {
        $user['etat_civil'] = $_POST['etat_civil'];
    } else {
        echo "etat_civil";
        die();
    }

    if (isset($_POST['adresse'])) {
        $user['adresse'] = $_POST['adresse'];
    } else {
        echo "adresse";
        die();
    }

    if (isset($_POST['tel_mobile']) && is_numeric($_POST['tel_mobile'])) {
        $user['tel_mobile'] = $_POST['tel_mobile'];
    } else {
        echo "tel_mobile";
        die();
    }

    if (isset($_POST['diplome'])) {
        $user['diplome'] = $_POST['diplome'];
    } else {
        echo "diplome";
        die();
    }

    if (isset($_POST['annee_dip']) && is_numeric($_POST['annee_dip'])) {
        $user['annee_dip'] = intval($_POST['annee_dip']);
    } else {
        echo "annee_dip";
        die();
    }

    if (isset($_POST['state']) && is_numeric($_POST['state'])) {
        $user['active'] = intval($_POST['state']);
    } else {
        echo "state";
        die();
    }

    if (isset($_POST['expire_date'])) {
        $user['expire_date'] = date("Y-m-d H:i:s", strtotime($_POST['expire_date']));
    } else {
        echo "expire_date";
        die();
    }

    $user = new User($user);
    $default = array('id_user' => intval($_POST['id_user']));
    $default = new User($default);

    define('fromajax', true);
    define('foruser', true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/User.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/IUserDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $selected = DAOFactory::getDAOFactory()->getUserDAO()->selectUser($default);
    if($_POST['pwd1'] == $selected->pwd) {
        $user->setPwd($_POST['pwd1']);
    }
    $result = DAOFactory::getDAOFactory()->getUserDAO()->updateUser($user);

    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    die();
}
?>
