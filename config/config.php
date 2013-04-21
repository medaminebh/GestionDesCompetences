<?php
    session_start();
    //set off all error for security purposes
	ini_set('display_errors', 'On');
        error_reporting(E_ALL);
	

	//define some contstant
    define( "DB_DSN", "mysql:host=localhost;port=3306;dbname=novatrice" );
    define( "DB_USERNAME", "root" );
    define( "DB_PASSWORD", "" );
    define( "CLS_PATH", "./class" );
    define( "DAO_PATH", CLS_PATH."/dao" );
    define( "TECH_PATH", CLS_PATH."/technique" );
    define( 'ADMIN_PATH', './admin' );
    define( 'MANAGER_PATH', './manager' );
    define( 'COLLAB_PATH', './collab' );
?>
