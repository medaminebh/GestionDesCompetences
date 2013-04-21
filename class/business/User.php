<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Med Amine
 */
class User{

// Attributs
   //id:
  private $user = array(
                    'id_user' => null,
                    'login' => null,
                    'pwd' => null,
                    'email' => null,
                    'nom_user' => null,
                    'prenom_user' => null,
                    'genre' => null,
                    'hire_date' => null,
                    'id_service' => null,
                    'privilege' => null,
                    'date_naiss' => null,
                    'etat_civil' => null,
                    'adresse' => null,
                    'tel_mobile' => null,
                    'diplome' => null,
                    'annee_dip' => null,
                    'last_login' => null,
                    'expire_date' => null,
                    'active' => null
                  );

  // Constructeurs

    function __construct($user = array()){
            if(isset($user['id_user'])) {
                $this->user['id_user'] = htmlspecialchars(intval($user['id_user']));
            }
            $this->user['login'] = isset($user['login'])? htmlspecialchars($user['login']) : '' ;
            $this->user['pwd'] = isset($user['pwd'])? md5(htmlspecialchars($user['pwd'])) : '' ;
            $this->user['email'] = isset($user['email'])? htmlspecialchars($user['email']) : '' ;
            $this->user['nom_user'] = isset($user['nom_user'])? htmlspecialchars($user['nom_user']) : '' ;
            $this->user['prenom_user'] = isset($user['prenom_user'])? htmlspecialchars($user['prenom_user']) : '' ;
            $this->user['genre'] = isset($user['genre'])? htmlspecialchars($user['genre']) : '' ;
            $this->user['hire_date'] = isset($user['hire_date'])? htmlspecialchars($user['hire_date']) : '' ;
            $this->user['id_service'] = isset($user['id_service'])? htmlspecialchars($user['id_service']) : 0 ;
            $this->user['privilege'] = isset($user['privilege'])? htmlspecialchars($user['privilege']) : -1 ;
            $this->user['date_naiss'] = isset($user['date_naiss'])? htmlspecialchars($user['date_naiss']) : '' ;
            $this->user['etat_civil'] = isset($user['etat_civil'])? htmlspecialchars($user['etat_civil']) : '' ;
            $this->user['adresse'] = isset($user['adresse'])? htmlspecialchars($user['adresse']) : '' ;
            $this->user['tel_mobile'] = isset($user['tel_mobile'])? htmlspecialchars($user['tel_mobile']) : '' ;
            $this->user['diplome'] = isset($user['diplome'])? htmlspecialchars($user['diplome']) : '' ;
            $this->user['annee_dip'] = isset($user['annee_dip'])? htmlspecialchars($user['annee_dip']) : 1930 ;
            $this->user['last_login'] = isset($user['last_login'])? htmlspecialchars($user['last_login']) : '' ;
            $this->user['expire_date'] = isset($user['expire_date'])? htmlspecialchars($user['expire_date']) : '' ;
            $this->user['active'] = isset($user['active'])? htmlspecialchars($user['active']) : 2 ;

	}

	//Getters

        public function getId_User(){
            return $this->user['id_user'];
        }

        public function getLogin(){
            return $this->user['login'];
        }

        public function getPwd(){
            return $this->user['pwd'];
        }

        public function getEmail(){
            return $this->user['email'];
        }
        
	public function getNom_User(){
            return $this->user['nom_user'];
        }

	public function getPrenom_User(){
            return $this->user['prenom_user'];
        }

        public function getGenre(){
            return $this->user['genre'];
        }

        public function getHire_Date(){
            return $this->user['hire_date'];
        }

        public function getId_Service(){
            return $this->user['id_service'];
        }

        public function getPrivilege(){
            return $this->user['privilege'];
        }

	public function getDate_Naiss(){
            return $this->user['date_naiss'];
        }

        public function getEtat_Civil(){
            return $this->user['etat_civil'];
        }

        public function getAdresse(){
            return $this->user['adresse'];
        }

        public function getTel_Mobile(){
            return $this->user['tel_mobile'];
        }

        public function getDiplome(){
            return $this->user['diplome'];
        }

        public function getAnnee_Dip(){
            return $this->user['annee_dip'];
        }

        public function getLast_Login(){
            return $this->user['last_login'];
        }

        public function getExpire_Date(){
            return $this->user['expire_date'];
        }

        public function getActive(){
            return $this->user['active'];
        }

	// Setters

	public function setId_User($id){
            $this->user['id_user'] = htmlspecialchars($id);
        }

        public function setLogin($login){
            $this->user['login'] = htmlspecialchars($login);
        }

        public function setPwd($pwd){
            $this->user['pwd'] = htmlspecialchars($pwd);
        }

        public function setEmail($email){
            $this->user['email'] = htmlspecialchars($email);
        }

	public function setNom_User($nom_user){
            $this->user['nom_user'] = htmlspecialchars($nom_user);
        }

	public function setPrenom_User($prenom_user){
            $this->user['prenom_user'] = htmlspecialchars($prenom_user);
        }

        public function setGenre($genre){
            $this->user['genre'] = htmlspecialchars($genre);
        }

        public function setHire_Date($hire_date){
            $this->user['hire_date'] = htmlspecialchars($hire_date);
        }

        public function setId_Service($id_service){
            $this->user['id_service'] = htmlspecialchars($id_service);
        }

        public function setPrivilege($privilege){
            $this->user['privilege'] = htmlspecialchars($privilege);
        }

	public function setDate_Naiss($date_naiss){
            $this->user['date_naiss'] = htmlspecialchars($date_naiss);
        }

        public function setEtat_Civil($etat_civil){
            $this->user['etat_civil'] = htmlspecialchars($etat_civil);
        }

        public function setAdresse($adresse){
            $this->user['adresse'] = htmlspecialchars($adresse);
        }

        public function setTel_Mobile($tel_mobile){
            $this->user['tel_mobile'] = htmlspecialchars($tel_mobile);
        }

        public function setDiplome($diplome){
            $this->user['diplome'] = htmlspecialchars($diplome);
        }

        public function setAnnee_Dip($annee_dip){
            $this->user['annee_dip'] = htmlspecialchars($annee_dip);
        }

        public function setLast_Login($last_login){
            $this->user['last_login'] = htmlspecialchars(date("Y-m-d H:i:s", strtotime($last_login)));
        }

        public function setExpire_Date($expire_date){
            $this->user['expire_date'] = htmlspecialchars(date("Y-m-d H:i:s", strtotime($expire_date)));
        }

        public function setActive($active){
            $this->user['active'] = htmlspecialchars($active);
        }

        function __toString(){
            return $this->user;
        }
}
?>
