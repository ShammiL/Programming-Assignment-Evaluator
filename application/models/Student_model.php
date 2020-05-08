<?php
class Student_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	function getCourses($indexNumber){

	   $this->db->where('indexNumber', $indexNumber);
	   $result = $this->db->get('students');

	   $semester = $result->row(0)->semester;

	   $this->db->where('semester',$semester);
	   $courses = $this->db->get('courses');

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

	public function get_students($course_id = 'CS3020'){

		// $query = $this->db->get('students');

		$this->db->select('students.indexNumber, fname, lname, email');
		$this->db->from('studentcourse');
		$this->db->join('students', 'students.indexNumber = studentcourse.indexNumber');
		$this->db->where('studentcourse.course_id', $course_id);
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_student_count($course_id = 'CS3020') {

		$this->db->select('COUNT(students.indexNumber) AS student_count');
		$this->db->from('studentcourse');
		$this->db->join('students', 'students.indexNumber = studentcourse.indexNumber');
		$this->db->where('studentcourse.course_id', $course_id);

		$query = $this->db->get();
		return $query->result_array()[0];

	}
}
