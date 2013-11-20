<?php

namespace projecten2\Repository;

class student extends \Knp\Repository {

	public function getTableName() {
		return 'students';
	}
	
	public function getUsersbyEmail($email){
		return $this->db->fetchAssoc('SELECT * From students where Email = ?', array($email));
	}
	
	public function getUsersbyName($username){
		return $this->db->fetchAssoc('SELECT * From students where Name = ?', array($username));
	}
	public function updateprevklas($id,$klas,$student){
		return $this->db->update('students', array('vorige_klasgroep' => $klas,'student' => $student), array('idStudents' => $id));	
	}
	
	public function getmodelstudents(){
		return $this->db->fetchAll("SELECT * FROM  `students` WHERE  `student` =1 AND  `id_Klasgroep` IS NULL ");
	}
	public function saveKlasgroep($klas,$id){
		return $this->db->update('students', array('id_Klasgroep' => $klas), array('idStudents' => $id));	
	}
}
