<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ICatCompetenceDAO
 *
 * @author Med Amine
 */
interface ICatCompetenceDAO {
    public function insertCatCompetence($cat_competence); // return boolean
    public function deleteCatCompetence($cat_competence); // return boolean
    public function updateCatCompetence($cat_competence); // return Category Competence
    public function findCatCompetence($cat_competence); // return boolean
    public function selectCatCompetence($cat_competence); // return Category Competence
    public function selectCatCompetences($cat_competences_filter, $limit);  // return array of Category Competences
}
?>
