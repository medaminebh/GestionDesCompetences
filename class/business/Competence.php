<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Competence

 */
class Competence{

// Attributs
   //id:
  private $competence = array(
                    'id_competence' => null,
                    'nom_competence' => null,
                    'description_competence' => null
                    );

  // Constructeurs

    function __construct($comp = array()){
            if(isset($comp['id_competence'])) {
                $this->competence['id_competence'] = htmlspecialchars(intval($comp['id_competence']));
            }
            $this->competence['nom_competence'] = isset($comp['nom_competence'])? htmlspecialchars($comp['nom_competence']) : '' ;
            $this->competence['description_competence'] = isset($comp['description_competence'])? htmlspecialchars($comp['description_competence']) : '' ;
	}
	//Getters

        public function getId_Competence(){
            return $this->competence['id_competence'];
        }

        public function getNomCompetence(){
            return $this->competence['nom_competence'];
        }

        public function getDescCompetence(){
            return $this->competence['description_competence'];
        }
    
	// Setters

        public function setId_Competence($id){
            $this->competence['id_competence'] = htmlspecialchars($id);
        }

        public function setNomCompetence($nom_competence){
            $this->competence['nom_competence'] = htmlspecialchars($nom_competence);
        }

        public function setDescCompetence($description_competence){
            $this->competence['description_competence'] = htmlspecialchars($description_competence);
        }  
}
?>
