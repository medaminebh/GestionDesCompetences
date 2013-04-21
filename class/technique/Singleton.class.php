<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Singleton
 *
 * @author Med Amine
 */

final class Singleton {
    private $cnx;
    private static $instance = null;

    private function __construct(){
        try{
            $this->cnx = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        }catch(PDOException $e) {
            echo "Error : ".$e->getMessage()."<br />";
            echo "Code : ".$e->getCode();
            die();
        }
    }

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self;
            }
        return self::$instance;
    }

    public function getConnection() {
        return $this->cnx;
    }
}
?>
