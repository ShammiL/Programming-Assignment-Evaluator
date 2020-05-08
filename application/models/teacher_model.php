<?php

class teacher_model extends CI_Model
{
	public function __construct() {
		$this->load->database();
	}

	public function get_teacher($teacher_id) {
		$query = $this->db->get_where('lecturer', array('email' => $teacher_id));
		return $query->result_array()[0];
	}

}
