<?php

class Testcase_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_testcases($assignment_id = 1) {

		$query = $this->db->get_where('testcases', array('assignment_id' => $assignment_id));
		return $query->result_array();

	}

	public function create($input){
		// print_r($input);
		return $this->db->insert('testcases', $input);
	}

	public function get_teacher($teacher_id) {

		$query = $this->db->get_where('lecturer', array('email' => $teacher_id));
		return $query->result_array()[0];
	}
}
