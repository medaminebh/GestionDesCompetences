<?php

define('fromauthentif', true);

include_once "business/User.php";

include_once "technique/Singleton.class.php";

include_once "dao/DAOFactory.class.php";


final class Authentification {

    private $cnx;
    private static $instance = null;
    private $user;


    private function __construct($data = array()) {
        try {
            $this->cnx = Singleton::getInstance()->getConnection();
            if (isset($data['username']) && isset($data['password'])){
                $this->user = new User(array('login' => $data['username'], 'pwd' => $data['password']));
            }
                
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage() . "<br />";
            echo "Code : " . $e->getCode();
            die();
        }
    }

    public static function getInstance($param) {
        if (!self::$instance instanceof self) {
            self::$instance = new Authentification($param);
        }
        return self::$instance;
    }

    public function logUser() {
        $c_user = null;
        $errMsg = '';
        try {
            $c_user = DAOFactory::getDAOFactory()->getUserDAO()->selectUser($this->user);

            if ($c_user) {
                if($c_user->active == 1){
                      if(strtotime($c_user->expire_date)>time()){
                          $_SESSION['c_user'] = $c_user;
                          $_SESSION['logged'] = $c_user->pwd;
                          $errMsg = '<script type="text/javascript">
                            $(document).ready(function(){
                                    jSuccess(\'Welcome '.$c_user->login.'\',
                                            {
                                            autoHide : true, // added in v2.0
                                            TimeShown : 5000,
                                            clickOverlay : true,
                                            VerticalPosition : \'top\',
                                            HorizontalPosition : \'right\'
                                    }
                                    );
                            });
                            </script>';
                      } else {
                          $c_user = null;
                    $errMsg = '<script type="text/javascript">
			$(document).ready(function(){
				jError(\'Sorry, your account expired!\',
					{
					autoHide : true, // added in v2.0
					TimeShown : 5000,
					clickOverlay : true,
					VerticalPosition : \'top\',
					HorizontalPosition : \'right\'
				}
				);
			});
			</script>';
                      }
                }
                else {
                    $c_user = null;
                    $errMsg = '<script type="text/javascript">
			$(document).ready(function(){
				jError(\'Your account is desactivated!\',
					{
					autoHide : true, // added in v2.0
					TimeShown : 5000,
					clickOverlay : true,
					VerticalPosition : \'top\',
					HorizontalPosition : \'right\'
				}
				);
			});
			</script>';
                }
            } else {
                $errMsg = '<script type="text/javascript">
			$(document).ready(function(){
				jError(\'Wrong username or password!\',
					{
					autoHide : true, // added in v2.0
					TimeShown : 5000,
					clickOverlay : true,
					VerticalPosition : \'top\',
					HorizontalPosition : \'right\'
				}
				);
			});
			</script>';
            }
            //$this->cnx = null;
            //$stmt->closeCursor();
            echo $errMsg;
            return $c_user;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return $c_user;
        }
    }

}

?>
