<?php

namespace projecten2\Repository;

class ispVakken extends \Knp\Repository {
		
	public function getTableName() {
		return 'isp_vakken';
	}
	
    
	public function addIsp_Vakken($idStudent, $idCourses){
        return $this->db->insert('isp_vakken',
            array(
                'ISP_aanvraag' => $idStudent,
                'idCourses' => $idCourses,
            ));
    }
	public function ispSemester1($id_aanvraag){
		return $this->db->fetchAll('SELECT c.Naam, c.Studiepunten FROM  `isp_vakken`  INNER JOIN  `courses` AS c ON c.idCourses = isp_vakken.idCourses WHERE c.Semester =1 AND isp_vakken.ISP_aanvraag = ?',array($id_aanvraag));
	}
	
	public function ispSemester2($id_aanvraag){
		return $this->db->fetchAll('SELECT c.Naam, c.Studiepunten FROM  `isp_vakken`  INNER JOIN  `courses` AS c ON c.idCourses = isp_vakken.idCourses WHERE c.Semester = 2 AND isp_vakken.ISP_aanvraag = ?',array($id_aanvraag));
	}
	
	public function notdoneCoursesStudent($id_student){
		return $this->db->fetchAll('SELECT courses.* from courses left join points on courses.idCourses = points.courses_idCourses and students_idStudents = ? and points.score = "success" where points.courses_idCourses is null and courses.OPO = 1 ',array($id_student));
	}
	public function Delete_ispvakken($aanvraag){
		
		return $this->db->delete('isp_vakken', array('ISP_aanvraag' => $aanvraag));
	}
}
