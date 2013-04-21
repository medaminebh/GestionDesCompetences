<?php
    define( "CFG_PATH", "config" );
    include(CFG_PATH."/config.php");
    include("header.php");
    if( empty($_SESSION['logged']) && !isset($_POST['login']) ) {
        include("login.php");
    }
    elseif( empty($_SESSION['logged']) && isset($_POST['login']) ) {
        include_once "class/Authentification.php";
        $c_user = Authentification::getInstance( $_POST )->logUser();
        if($c_user){
            include 'dashbord.php';
        }
        else {
            include("login.php");
        }
    } elseif(!empty($_SESSION['logged'])) {
        include 'dashbord.php';
    }
    include("footer.php");
?>
