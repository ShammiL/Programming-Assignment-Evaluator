<?php

class Course_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function create_course($input) {

		return $this->db->insert('courses', $input);
	}

	public function get_courses($lecturer_id = NULL) {

		if ($lecturer_id !== NULL) {

			$query = $this->db->get_where('courses', array('lecturer_id' => $lecturer_id));
			return $query->result_array();

		}

		$query = $this->db->get('courses');
		return $query->result_array();

	}

	public function get_course_count() {

		$this->db->select('COUNT(course_id) AS course_count');
		$query = $this->db->get('courses');
		return $query->result_array()[0]['course_count'];
	}

	function getCourseDetails($course_id){

		$this->db->where('course_id',$course_id);
		$result = $this->db->get('courses');

		return $result->row();
	}

	function getAssignments($course_id){

		$this->db->where('course_id',$course_id);
		$this->db->order_by('deadline','ASC');
		$result = $this->db->get('assignments');

		return $result->result_array();
	}

}
