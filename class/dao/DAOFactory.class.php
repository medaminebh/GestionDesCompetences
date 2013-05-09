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

if(defined('forprojet')){
    include_once "ProjetDAO.class.php";
}

if(defined('forcatcompetence')){
    include_once "CatCompetenceDAO.class.php";
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

    public function getCatCompetenceDAO() {
        // CompetenceDAO implements ICompetenceDAO
        return CatCompetenceDAO::getCatCompetenceDAO();
    }
    public function getProjetDAO() {
        // ProjetDAO implements IProjetDAO
        return ProjetDAO::getProjetDAO();
    }
}
?>
