<?php

	class course_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		function getCourseDetails($course_id){

			$this->db->where('course_id',$course_id);
			$result = $this->db->get('course');

			return $result->row();
		}

		function getAssignments($course_id){

			$this->db->where('course_id',$course_id);
			$this->db->order_by('deadline','ASC');
			$result = $this->db->get('assignment');

			return $result->result_array();
		}
	}