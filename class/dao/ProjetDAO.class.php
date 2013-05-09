<?php
if(!defined('fromajax')){
    require_once "class/business/Projet.php";

    require_once "lib/functions.php";

    require_once "IProjetDAO.interface.php";
}

ini_set('display_errors', 'On');
        error_reporting(E_ALL);

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


final class ProjetDAO implements IProjetDAO {
    private $table = "projet";
    private static $instance = null;
    private $cnx;

    public function __construct(){
        try{
            $this->cnx = Singleton::getInstance()->getConnection();
        }catch(PDOException $e) {
            echo "Error : ".$e->getMessage()."<br />";
            echo "Code : ".$e->getCode();
            die();
        }
    }

    public static function getProjetDAO() {
        if(!self::$instance instanceof self){
            self::$instance = new ProjetDAO();
        }
        return self::$instance;
    }

    public function insertProjet($projet){
        // return boolean
        $added = false;
        $test_exist_projet = new Projet(array('nom_projet' => $projet->getNomProjet()));
        if($this->findProjet($test_exist_projet)) {
            return $added;
        } elseif(!$this->findProjet($test_exist_projet)){
            try {
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->cnx->prepare(insertQuery($projet, $this->table));
                bindValQuery($projet, $this->table, $stmt);

                if($stmt->execute()) {
                    $added = true;
                }

                $stmt->closeCursor();

                return $added;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return $added;
            }
        }
    }

    public function deleteProjet($projet){
        // return boolean
        $deleted = false;
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(deleteQuery($projet, $this->table));
            bindValQuery($projet, $this->table, $stmt);

            if($stmt->execute()) {
                $deleted = true;
            }

            $stmt->closeCursor();
            return $deleted;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $deleted;
        }
    }

    public function updateProjet($projet){
        // return boolean
        $updated = false;
        $test_exist_projet = new Projet(array('id_projet' => $projet->getId_Projet()));
        if($this->findProjet($test_exist_projet)) {
            try {
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->cnx->prepare(updateQuery($projet, $this->table));
                bindValQuery($projet, $this->table, $stmt);

                if($stmt->execute()) {
                    $updated = true;
                }

                $stmt->closeCursor();

                return $updated;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return $updated;
            }
        }
    }

    public function findProjet($projet){
        // return boolean
        $exist = false;
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($projet, $this->table)." LIMIT 1");
            bindValQuery($projet, $this->table, $stmt);
            $stmt->execute();
            $projet = $stmt->fetch(PDO::FETCH_OBJ);

            if ($projet) {
                $exist = true;
            }

            $stmt->closeCursor();
            return $exist;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $exist;
        }
    }

    public function selectProjet($projet){
       	// return Competence
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($projet, $this->table)." LIMIT 1");
            bindValQuery($projet, $this->table, $stmt);
            $stmt->execute();
            $projet = $stmt->fetch(PDO::FETCH_OBJ);

            $stmt->closeCursor();

            return $projet;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $projet;
        }
    }

    public function selectProjets($projets_filtre, $limit = ""){
       // return array of Users
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($projets_filtre, $this->table).$limit);
            bindValQuery($projets_filtre, $this->table, $stmt);
            $stmt->execute();
            $projets = $stmt->fetchAll();

            $stmt->closeCursor();

            return $projets;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $projets;
        }
    }

}
?>
