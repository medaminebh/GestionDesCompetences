<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Competence

 */
class Projet{

// Attributs
   //id:
  private $projet = array(
                    'id_projet' => null,
                    'nom_projet' => null,
                    'description_projet' => null
                    );

  // Constructeurs

    function __construct($projet = array()){
            if(isset($projet['id_projet'])) {
                $this->projet['id_projet'] = htmlspecialchars(intval($projet['id_projet']));
            }
            $this->projet['nom_projet'] = isset($projet['nom_projet'])? htmlspecialchars($projet['nom_projet']) : '' ;
            $this->projet['description_projet'] = isset($projet['description_projet'])? htmlspecialchars($projet['description_projet']) : '' ;
	}
	//Getters

        public function getId_Projet(){
            return $this->projet['id_projet'];
        }

        public function getNomProjet(){
            return $this->projet['nom_projet'];
        }

        public function getDescProjet(){
            return $this->projet['description_projet'];
        }
    
	// Setters

        public function setId_Projet($id){
            $this->projet['id_projet'] = htmlspecialchars($id);
        }

        public function setNomProjet($nom_projet){
            $this->projet['nom_projet'] = htmlspecialchars($nom_projet);
        }

        public function setDescProjet($description_projet){
            $this->projet['description_projet'] = htmlspecialchars($description_projet);
        }  
}
?>
