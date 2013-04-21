<?php
if(!defined('fromajax')){
require_once "class/technique/Singleton.class.php";
}

if(defined('foruser') || defined('fromauthentif')){
    include_once "UserDAO.class.php";
}

if(defined('forcompetence')){
    include_once "CompetenceDAO.class.php";
}

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MYSQLDAOFactory
 *
 * @author Med Amine
 */

final class DAOFactory {
// method to create Cloudscape connections
    private static $instance = null;
    private $cnx;

    private function __construct(){
        try{
            $this->cnx = Singleton::getInstance()->getConnection();
        }catch(PDOException $e) {
            echo "Error : ".$e->getMessage()."<br />";
            echo "Code : ".$e->getCode();
            die();
        }
    }

    public static function getDAOFactory() {
        if(!self::$instance instanceof self){
            self::$instance = new DAOFactory();
        }
        return self::$instance;
    }

    public function getUserDAO() {
        // UserDAO implements IUserDAO
        return UserDAO::getUserDAO();
    }

    public function getCompetenceDAO() {
        // CompetenceDAO implements ICompetenceDAO
        return CompetenceDAO::getCompetenceDAO();
    }
}
?>
