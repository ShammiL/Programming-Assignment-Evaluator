<?php

	class student_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

	 	function getCourses($indexNumber){

			$this->db->where('indexNumber',$indexNumber);
			$result = $this->db->get('student');

			$semester = $result->row(0)->semester;

			$this->db->where('semester',$semester);
			$courses = $this->db->get('course');

			return $courses->result_array();
		}

		function checkEnrollment($student_id,$course_id){

			$this->db->where('course_id',$course_id);
			$this->db->where('indexNumber',$student_id);
			$result = $this->db->get('studentcourse');

			if($result->num_rows() > 0){
				return $result->row(0)->course_id;
			} else {
				return FALSE;
			}
			
		}

		function enrollToCourse($indexNumber,$course_id){

			$data = array(
				'course_id' => $course_id,
				'indexNumber' => $indexNumber
			);

			if($this->db->insert('studentcourse',$data)){
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}