<?php

namespace projecten2\Repository;

class klasgroep extends \Knp\Repository {

	public function getTableName() {
		return 'klasgroep';
	}
	public function getklas(){
		return $this->db->fetchAll('select * from klasgroep');
	}
	public function saveNewKlas($name,$jaar,$max){
		return $this->db->insert('klasgroep',
            array(
                'Naam' => $name,
                'jaar' => $jaar,
                'max_student' => $max
            ));
	}
	public function deleteKlasgroep($id){
		return $this->db->delete('klasgroep', array('idklasgroep' => $id));
	}
}