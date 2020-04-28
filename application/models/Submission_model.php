<?php
class Submission_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_submissions($assignment_id = 1){
        

        $query = $this->db->get_where('submissions', array('assignment_id' => $assignment_id));
        return $query->result_array();
       
    }
}