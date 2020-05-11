<?php

class teacher_model extends CI_Model
{
	public function __construct() {
		$this->load->database();
	}

	public function signup_teacher($input) {

		$db2 = $this->load->database('db2',TRUE);
		return $db2->insert('lecturer', $input);
	}

	public function add_teacher($input) {

		return $this->db->insert('lecturer', $input);
	}

	public function get_teacher($teacher_id = NULL) {

		if ($teacher_id) {
			$query = $this->db->get_where('lecturer', array('email' => $teacher_id));
			return $query->result_array()[0];
		}

		$query = $this->db->get('lecturer');
		return $query->result_array();
	}

	public function get_teacher_count() {
			
		$db2 = $this->load->database('db2',TRUE);
		$db2->select('COUNT(email) AS teacher_count');
		$query = $db2->get('lecturer');
		return $query->result_array()[0]['teacher_count'];

	}
}
