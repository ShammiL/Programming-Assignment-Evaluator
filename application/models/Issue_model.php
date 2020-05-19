<?php
class Issue_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_issues($assignment_id){
       
        $query = $this->db->get_where('issues', array('assignment_id' => $assignment_id));
        return $query->result_array();
       
    }

}