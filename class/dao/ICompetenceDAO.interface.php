<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


interface ICompetenceDAO {
    public function insertCompetence($competence); // return boolean
    public function deleteCompetence($competence); // return boolean
    public function updateCompetence($competence); // return Competence
    public function findCompetence($competence); // return boolean
    public function selectCompetence($competence); // return Competence
    public function selectCompetences($competences_filter, $limit);  // return array of Competences
}
?>
