<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_Competence
 *
 * @author Med Amine
 */
class CatCompetence{

// Attributs
   //id:
  private $cat_competence = array(
                    'id_cat_competence' => null,
                    'nom_cat_competence' => null,
                    'description_cat_competence' => null
                    );

  // Constructeurs

    function __construct($comp = array()){
            if(isset($comp['id_cat_competence'])) {
                $this->cat_competence['id_cat_competence'] = htmlspecialchars(intval($comp['id_cat_competence']));
            }
            $this->cat_competence['nom_cat_competence'] = isset($comp['nom_cat_competence'])? htmlspecialchars($comp['nom_cat_competence']) : '' ;
            $this->cat_competence['description_cat_competence'] = isset($comp['description_cat_competence'])? htmlspecialchars($comp['description_cat_competence']) : '' ;
	}

    //Getters
        
    public function getId_CatCompetence(){
        return $this->cat_competence['id_cat_competence'];
    }

    public function getNomCatCompetence(){
        return $this->cat_competence['nom_cat_competence'];
    }

    public function getDescCatCompetence(){
        return $this->cat_competence['description_cat_competence'];
    }

    // Setters

    public function setId_CatCompetence($id){
        $this->cat_competence['id_cat_competence'] = htmlspecialchars($id);
    }

    public function setNomCatCompetence($nom_cat_competence){
        $this->cat_competence['nom_cat_competence'] = htmlspecialchars($nom_cat_competence);
    }

    public function setDescCatCompetence($description_cat_competence){
        $this->cat_competence['description_cat_competence'] = htmlspecialchars($description_cat_competence);
    }
        
}
?>
