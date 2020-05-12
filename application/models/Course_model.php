<?php

class Course_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_courses($course_id = NULL) {

		if ($course_id !== NULL) {

			$query = $this->db->get_where('courses', array('slug' => $course_id));
			return $query->result_array();

		}

		$query = $this->db->get('courses');
		return $query->result_array();

	}

}
