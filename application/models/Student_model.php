<?php
class Student_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function signup_student($input) {

		$db2 = $this->load->database('db2',TRUE);
		return $db2->insert('student', $input);
	}

	public function get_password($indexNumber) {

		$db2 = $this->load->database('db2',TRUE);
		$db2->select('password');
		return $db2->get_where('student', array('indexNumber' => $indexNumber))->row(0);
	}
	
	public function change_password($index_number, $pwrd) {

		$db2 = $this->load->database('db2',TRUE);
		$db2->set('password', $pwrd);
        $db2->where('indexNumber',$index_number);
		return $db2->update('student');
	}

	public function add_student($input) {
		
		return $this->db->insert('students', $input);
	}

    function update_student($id, $data){

        $this->db->set($data);
        $this->db->where('indexNumber',$id);
        return $this->db->update('students');
    }

	function getCourses($indexNumber){

	   $this->db->where('indexNumber', $indexNumber);
	   $result = $this->db->get('students');

	   $semester = $result->row(0)->semester;

	   $this->db->where('semester', $semester);
	   $courses = $this->db->get('courses');

	   return $courses->result_array();
   }

   function checkEnrollment($student_id, $course_id){

	   $this->db->where('course_id', $course_id);
	   $this->db->where('indexNumber', $student_id);
	   $result = $this->db->get('studentcourse');

	   if($result->num_rows() > 0){
		   return $result->row(0)->course_id;
	   } else {
		   return FALSE;
	   }	   
   	}

	public function get_students($course_id = 'CS3042', $student_id=NULL){

		$this->db->from('studentcourse');
		$this->db->join('students', 'students.indexNumber = studentcourse.indexNumber');

		if ($student_id) {
			$this->db->where(array('studentcourse.course_id'=>$course_id, 'studentcourse.indexNumber'=>$student_id));
		} else {
			$this->db->where(array('studentcourse.course_id'=>$course_id));
		}

		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_all_students($student_id=NULL){

		if ($student_id) {
			$query = $this->db->get_where('students', array('students.indexNumber'=>$student_id));
			return $query->result_array()[0];
		} 

		$query = $this->db->get('students');
		return $query->result_array();
	}

	public function get_student_count($course_id = NULL) {

		if ($course_id) {

			$this->db->select('COUNT(students.indexNumber) AS student_count');
			$this->db->from('studentcourse');
			$this->db->join('students', 'students.indexNumber = studentcourse.indexNumber');
			$this->db->where('studentcourse.course_id', $course_id);

			$query = $this->db->get();
			return $query->result_array()[0];

		} else {
			
			$db2 = $this->load->database('db2',TRUE);
			$db2->select('COUNT(indexNumber) AS student_count');
			$query = $db2->get('student');
			return $query->result_array()[0]['student_count'];

		}
	}
}
