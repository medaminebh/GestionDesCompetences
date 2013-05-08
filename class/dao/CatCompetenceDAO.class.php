<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatCompetenceDAO
 *
 * @author Med Amine
 */

if(!defined('fromajax')){
    require_once "class/business/CatCompetence.php";

    require_once "lib/functions.php";

    require_once "ICatCompetenceDAO.interface.php";
}

ini_set('display_errors', 'On');
        error_reporting(E_ALL);

class CatCompetenceDAO implements ICatCompetenceDAO {
    private $table = "cat_competence";
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

    public static function getCatCompetenceDAO() {
        if(!self::$instance instanceof self){
            self::$instance = new CatCompetenceDAO();
        }
        return self::$instance;
    }

    public function insertCatCompetence($cat_competence){
        // return boolean
        $added = false;
        $test_exist_cat_competence = new CatCompetence(array('nom_cat_competence' => $cat_competence->getNomCatCompetence()));
        if($this->findCatCompetence($test_exist_cat_competence)) {
            return $added;
        } elseif(!$this->findCatCompetence($test_exist_cat_competence)){
            try {
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->cnx->prepare(insertQuery($cat_competence, $this->table));
                bindValQuery($cat_competence, $this->table, $stmt);

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

    public function deleteCatCompetence($cat_competence){
        // return boolean
        $deleted = false;
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(deleteQuery($cat_competence, $this->table));
            bindValQuery($cat_competence, $this->table, $stmt);

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

    public function updateCatCompetence($cat_competence){
        // return boolean
        $updated = false;
        $test_exist_cat_competence = new CatCompetence(array('id_cat_competence' => $cat_competence->getId_CatCompetence()));
        if($this->findCatCompetence($test_exist_cat_competence)) {
            try {
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->cnx->prepare(updateQuery($cat_competence, $this->table));
                bindValQuery($cat_competence, $this->table, $stmt);

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

    public function findCatCompetence($cat_competence){
        // return boolean
        $exist = false;
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($cat_competence, $this->table)." LIMIT 1");
            bindValQuery($cat_competence, $this->table, $stmt);
            $stmt->execute();
            $cat_competence = $stmt->fetch(PDO::FETCH_OBJ);

            if ($cat_competence) {
                $exist = true;
            }

            $stmt->closeCursor();
            return $exist;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $exist;
        }
    }

    public function selectCatCompetence($cat_competence){
       	// return Competence
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($cat_competence, $this->table)." LIMIT 1");
            bindValQuery($cat_competence, $this->table, $stmt);
            $stmt->execute();
            $cat_competence = $stmt->fetch(PDO::FETCH_OBJ);

            $stmt->closeCursor();

            return $cat_competence;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $cat_competence;
        }
    }

    public function selectCatCompetences($cat_comeptences_filtre, $limit = ""){
       // return array of Users
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($cat_comeptences_filtre, $this->table).$limit);
            bindValQuery($cat_comeptences_filtre, $this->table, $stmt);
            $stmt->execute();
            $cat_competences = $stmt->fetchAll();

            $stmt->closeCursor();

            return $cat_competences;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $cat_competences;
        }
    }
}
?>
