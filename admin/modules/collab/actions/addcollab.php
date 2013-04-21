<?php

//include config
include("../../../../config/config.php");

if($_SESSION['c_user']->privilege != 0) {
    header("Location: index.html");
}

require_once "../../../../class/business/User.php";


/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['submit'])) {
    $user = array();

    if(isset($_POST['login'])){
       $user['login'] = $_POST['login'];
    }else{
        echo "login";
        die();
    }

    if(isset($_POST['pwd1']) && isset($_POST['pwd2']) && ($_POST['pwd1'] == $_POST['pwd2'])){
       $user['pwd'] = $_POST['pwd1'];
    }else{
        echo "pwd";
        die();
    }

    if(isset($_POST['email'])){
       $user['email'] = $_POST['email'];
    }else{
        echo "email";
        die();
    }

    if(isset($_POST['nom'])){
       $user['nom_user'] = $_POST['nom'];
    }else{
        echo "nom";
        die();
    }

    if(isset($_POST['prenom'])){
       $user['prenom_user'] = $_POST['prenom'];
    }else{
        echo "prenom";
        die();
    }

    if(isset($_POST['genre'])){
       $user['genre'] = $_POST['genre'];
    }else{
        echo "genre";
        die();
    }

    if(isset($_POST['id-service']) && is_numeric($_POST['id-service']) && $_POST['id-service'] > 0){
       $user['id_service'] = $_POST['id-service'];
    }else{
        echo "id-service";
        die();
    }

    if(isset($_POST['date_naiss'])){
       $user['date_naiss'] = $_POST['date_naiss'];
    }else{
        echo "date_naiss";
        die();
    }

    if(isset($_POST['etat_civil'])){
       $user['etat_civil'] = $_POST['etat_civil'];
    }else{
        echo "etat_civil";
        die();
    }

    if(isset($_POST['adresse'])){
       $user['adresse'] = $_POST['adresse'];
    }else{
        echo "adresse";
        die();
    }

    if(isset($_POST['tel_mobile']) && is_numeric($_POST['tel_mobile'])){
       $user['tel_mobile'] = $_POST['tel_mobile'];
    }else{
        echo "tel_mobile";
        die();
    }

    if(isset($_POST['diplome'])){
       $user['diplome'] = $_POST['diplome'];
    }else{
        echo "diplome";
        die();
    }

    if(isset($_POST['annee_dip']) && is_numeric($_POST['annee_dip'])){
       $user['annee_dip'] = $_POST['annee_dip'];
    }else{
        echo "annee_dip";
        die();
    }

    if(isset($_POST['state']) && is_numeric($_POST['state'])){
       $user['active'] = $_POST['state'];
    }else{
        echo "state";
        die();
    }
    $user['hire_date'] = date("Y-m-d");
    $user['privilege'] = 2;
    $user['last_login'] = date("Y-m-d H:i:s");
    $user['expire_date'] = date("Y-m-d H:i:s", time()+(86400*30));

    $user = new User($user);

    define('fromajax',true);
    define('foruser', true);

    //UserDAO.class.php requires
    require_once "../../../../class/business/User.php";
    require_once "../../../../lib/functions.php";
    require_once "../../../../class/dao/IUserDAO.interface.php";

    //DAOFactroy.class.php requires
    require_once "../../../../class/technique/Singleton.class.php";

    require_once "../../../../class/dao/DAOFactory.class.php";

    $result = DAOFactory::getDAOFactory()->getUserDAO()->insertUser($user);

    if($result){
        echo "1";
    }
    else{
        echo "0";
    }
}else{
    die();
}
?>
