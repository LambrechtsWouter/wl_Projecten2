<?php

namespace projecten2\Repository;

class admin extends \Knp\Repository {

	public function getTableName() {
		return 'administrators';
	}
	
	public function getUsersbyEmail($email){
		return $this->db->fetchAssoc('SELECT * From administrators where Email = ?', array($email));
	}
	
	public function getUsersbyName($username){
		return $this->db->fetchAssoc('SELECT * From administrators where Name = ?', array($username));
	}
	
}