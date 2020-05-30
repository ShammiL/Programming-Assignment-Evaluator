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

    function update_course($id, $data){

        $this->db->set($data);
        $this->db->where('course_id', $id); 
        return $this->db->update('courses');
    }

	public function search_course($id) {
		$this->db->like('course_id', $id);
		$query = $this->db->get('courses');
		return $query->result_array();
	}

	public function get_courses($course_id = NULL) {

		if ($course_id !== NULL) {

			$query = $this->db->get_where('courses', array('course_id' => $course_id));
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

	function get_course_by_lecturer($lecturer_id){

		$this->db->where('lecturer_nic', $lecturer_id);
		$result = $this->db->get('courses');
		return $result->result_array();
	}
}
