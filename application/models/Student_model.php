<?php
class Student_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_students($course_id = 'CS3020'){
       
        // $query = $this->db->get('students');
        $this->db->select('students.indexNumber, fname, lname');
        $this->db->from('studentcourse');
        $this->db->join('students', 'students.indexNumber = studentcourse.indexNumber');
        $this->db->where('studentcourse.course_id', $course_id);
        $query = $this->db->get();
        return $query->result_array();

    }
}