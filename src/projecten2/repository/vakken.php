<?php

namespace projecten2\Repository;

class vakken extends \Knp\Repository {

	public function getTableName() {
		return 'courses';
	}

	public function getAllOpo() {
		return $this->db->fetchAll('SELECT * FROM  `courses` WHERE OPO = 1');
	}
	public function getAllOlobyJaar($jaar) {
		return $this->db->fetchAll('SELECT * FROM  `courses` WHERE OLA = 1 and Jaar =?',array($jaar));
	}
	public function getAllOla(){
		return $this->db->fetchAll('SELECT * FROM  `courses` INNER JOIN OPO ON  `idCourses` = id_OLA WHERE  `OLA` =1');
	}
	
	public function all(){
		return $this->db->fetchAll('SELECT courses.naam, id_OPO FROM  `opo` INNER JOIN courses ON  `id_OLA` =  `idCourses`' );
	}
	
	public function addPoints($student,$score,$idCourses){
        return $this->db->insert('points',
            array(
                'score' => $score,
                'students_idStudents' => $student,
                'courses_idCourses' => $idCourses
            ));
    }
	public function getPoints($id){
		return $this->db->fetchAll('SELECT * FROM  `points` WHERE students_idStudents = ?',array($id));
	}
	public function checkVolgtijdelijkheden($Courses){
    	$array; 
		$n = 0;
    	
    	foreach ($Courses as $course) {
    		$bool = false;
    		$volgtijdelijkheid = $this->db->fetchAll('SELECT * from volgtijdelijkheden where id_Vak = '. $course['idCourses']);
			foreach($volgtijdelijkheid as $i){
				foreach ($Courses as $vak) {
					if($i['id_GeslaagdVak'] == $vak['idCourses']){
						$bool = true;
					}
				}
			}
			if($bool == false){
				$array[$n] = $course;
				$n++;
				
			}
		}
		return $array;
    }
	
	public function notdoneCoursesStudent($student){
		return $this->db->fetchAll('SELECT courses.* from courses left join points on courses.idCourses = points.courses_idCourses and students_idStudents = ? where points.courses_idCourses is null and courses.OPO = 1 ', array($student));
	}
	
	public function unsuccessCourses($student){
		return $this->db->fetchAll('SELECT courses . * FROM courses LEFT JOIN points ON courses.idCourses = points.courses_idCourses AND students_idStudents = ? WHERE courses.OPO =1 AND points.score =  "unsuccess"', array($student));
	}
}