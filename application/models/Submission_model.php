<?php
class Submission_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_submissions($assignment_id, $student_id=NULL){

        if ($student_id) {
            $query = $this->db->get_where('submissions', array('assignment_id'=>$assignment_id, 'student_id'=>$student_id));
        } else {
            $query = $this->db->get_where('submissions', array('assignment_id'=>$assignment_id));
        }
        
        return $query->result_array();
       
    }
}