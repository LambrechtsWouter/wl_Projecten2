<?php

namespace projecten2\Repository;

class lesrooster extends \Knp\Repository {

	public function getTableName() {
		return 'lesrooster';
	}

	public function getbyKlasSem1($klas) {
		return $this->db->fetchAll('SELECT `idlesrooster`, lesuur.uur,  `Dag` , les.Naam AS vak, klasgroep.Naam FROM  `lesrooster` INNER JOIN  `courses` AS les ON  `courses_idCourses` =  `idCourses` INNER JOIN  `klasgroep` ON  `klasgroep_idklasgroep` =  `idklasgroep` INNER JOIN  `lesuren` AS lesuur ON  `id` =  `les` WHERE  `klasgroep_idklasgroep` =? AND les.Semester =1 ORDER BY Dag ASC , les ASC ',array($klas));
	}
	
	public function getbyKlasSem2($klas) {
		return $this->db->fetchAll('SELECT `idlesrooster`, lesuur.uur,  `Dag` , les.Naam AS vak, klasgroep.Naam FROM  `lesrooster` INNER JOIN  `courses` AS les ON  `courses_idCourses` =  `idCourses`  INNER JOIN  `klasgroep` ON  `klasgroep_idklasgroep` =  `idklasgroep` INNER JOIN  `lesuren` AS lesuur ON  `id` =  `les` WHERE  `klasgroep_idklasgroep` =? AND les.Semester =2 ORDER BY Dag ASC , les ASC ',array($klas));
	}
	
	public function getklasbyId($id){
		return $this->db->fetchAssoc('select * from klasgroep where idklasgroep = ?',array($id));
	}
	public function deleteLes($id){
		return $this->db->delete('lesrooster', array('idlesrooster' => $id));
	}
	public function getLes($id){
		return $this->db->fetchAssoc('select * from lesrooster where idlesrooster = ?',array($id));
	}
	public function addLessen($vak,$dag,$uur,$max,$klas,$week,$opmerking){
		return $this->db->insert('lesrooster',
			array(
			'courses_idCourses' => $vak,
			'les' => $uur,
			'Dag' => $dag,
			'max_student' => $max,
			'week' => $week,
			'opmerking' => $opmerking,
			'klasgroep_idklasgroep' =>$klas
		));
	} 
}