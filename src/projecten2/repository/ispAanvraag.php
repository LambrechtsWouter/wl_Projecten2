<?php

namespace projecten2\Repository;

class ispAanvraag extends \Knp\Repository {
		
	public function getTableName() {
		return 'isp_aanvraag';
	}
	public function getIsp_Aanvraag($id_student){
		return $this->db->fetchAssoc('SELECT * From isp_aanvraag where students_idStudents = ?', array($id_student));
	}

	public function getCount(){
		return $this->db->fetchAssoc('SELECT COUNT(*) AS total FROM isp_aanvraag');
	}
	public function getIsp_Aanvragen(){
		return $this->db->fetchAll('SELECT isp_aanvraag.idISP_aanvraag, isp_aanvraag.schooljaar, isp_aanvraag.toestand, isp_aanvraag.datum, isp_aanvraag.students_idStudents, students.name From isp_aanvraag inner join students where students.idstudents = isp_aanvraag.students_idStudents ORDER BY isp_aanvraag.toestand DESC');
	}

	public function getIsp_AanvraagDetail($id){
		return $this->db->fetchAll('SELECT isp_aanvraag.idISP_aanvraag, isp_aanvraag.schooljaar, isp_aanvraag.studiepunten, isp_aanvraag.toestand, isp_aanvraag.commentaar, isp_aanvraag.datum, students.name, students.email from isp_aanvraag inner join students where isp_aanvraag.idISP_aanvraag = ? and students.idstudents = isp_aanvraag.students_idStudents', array($id));
	}
	
	public function addIsp_Aanvraag($id_student,$toestand, $commentaar){
       $this->db->insert('isp_aanvraag',
            array(
                'students_idStudents' => $id_student,
                'Schooljaar' => '2013 - 2014',
                'studiepunten' => 0,
                'toestand' => $toestand,
                'Commentaar' => $commentaar,
                'datum' => date("Y-m-d H:i:s")
            ));
		return $this->db->fetchColumn('SELECT * FROM  `isp_aanvraag` WHERE students_idStudents =' . $id_student);
    }
    
	public function addIsp_Vakken($id_student, $idCourses){
        return $this->db->insert('isp_vakken',
            array(
                'ISP_aanvraag' => $id_student,
                'idCourses' => $idCourses,
            ));
    }
	
	public function notdoneCoursesStudent(){
		return $this->db->fetchAll('SELECT courses.* from courses left join points on courses.idCourses = points.courses_idCourses and students_idStudents = 1 and points.score = "success" where points.courses_idCourses is null and courses.OPO = 1 ');
	}
	
	public function Delete_aanvraag($student){
		return $this->db->delete('isp_aanvraag',array('students_idStudents' => $student));
	}
	
	public function Delete_points($student){
		return $this->db->delete('points', array('students_idStudents' => $student));
	}
	public function UpdateCommentaar($commentaar, $id){
		return $this->db->update('isp_aanvraag', array('Commentaar' => $commentaar), array('students_idStudents' => $id));	
	}
public function getIsp_Goedkeuren(array $data, array $itemId){
    	return $this->db->update($this->getTableName(), $data, $itemId);
	}

	public function getIsp_Afkeuren(array $data, array $itemId){
    	return $this->db->update($this->getTableName(), $data, $itemId);
	}
	}
