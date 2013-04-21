<?php
if(!defined('fromajax')){
    require_once "class/business/User.php";

    require_once "lib/functions.php";

    require_once "IUserDAO.interface.php";
}

ini_set('display_errors', 'On');
        error_reporting(E_ALL);

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MYSQLAdminDAO
 *
 * @author Med Amine
 */

final class UserDAO implements IUserDAO {
    private $table = "user";
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

    public static function getUserDAO() {
        if(!self::$instance instanceof self){
            self::$instance = new UserDAO();
        }
        return self::$instance;
    }

    public function insertUser($user){
        // return boolean
        $added = false;
        $test_exist_user = new User(array('email' => $user->getEmail()));
        if($this->findUser($test_exist_user)) {
            return $added;
        } elseif(!$this->findUser($test_exist_user)){
            try {
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->cnx->prepare(insertQuery($user, $this->table));
                bindValQuery($user, $this->table, $stmt);
                
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

    public function deleteUser($user){
        // return boolean
        $deleted = false;
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(deleteQuery($user, $this->table));
            bindValQuery($user, $this->table, $stmt);

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

    public function updateUser($user){
        // return boolean
        $updated = false;
        $test_exist_user = new User(array('id_user' => $user->getId_User()));
        if($this->findUser($test_exist_user)) {
            try {
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $this->cnx->prepare(updateQuery($user, $this->table));
                bindValQuery($user, $this->table, $stmt);

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

    public function findUser($user){
        // return boolean
        $exist = false;
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($user, $this->table)." LIMIT 1");
            bindValQuery($user, $this->table, $stmt);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user) {
                $exist = true;
            }

            $stmt->closeCursor();
            return $exist;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $exist;
        }
    }

    public function selectUser($user){
        // return User
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($user, $this->table)." LIMIT 1");
            bindValQuery($user, $this->table, $stmt);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            
            $stmt->closeCursor();

            return $user;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $user;
        }
    }

    public function selectUsers($users_filtre, $limit = ""){
        // return array of Users
        try {
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->cnx->prepare(selectQuery($users_filtre, $this->table).$limit);
            bindValQuery($users_filtre, $this->table, $stmt);
            $stmt->execute();
            $users = $stmt->fetchAll();

            $stmt->closeCursor();

            return $users;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $user;
        }
    }

}
?>
