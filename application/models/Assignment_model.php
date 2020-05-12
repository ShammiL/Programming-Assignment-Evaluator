<?php
class Assignment_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_assignments($course_id = 'CS3020'){
        // if($course_id === 'CS3020'){
        //     // $query = $this->db->get('assignments');
        //     // return $query->result_array();
        //     echo ('nothing');
        // }

        $query = $this->db->get_where('assignments', array('course_id' => $course_id));
        return $query->result_array();
       
    }

    public function get_one($assignment_id = 1){
       
        // $query = $this->db->get('students');
        $this->db->select('*');
        $this->db->from('assignments');
        $this->db->where('assignment_id', $assignment_id);
        $query = $this->db->get();
        return $query->result_array()[0];

    }

    public function create_assignment($input){

        return $this->db->insert('assignments', $input);
    }

    public function update_assignment($input){
        $id = $this->input->post('id');
        $this->db->where('assignment_id', $id);
        return $this->db->update('assignments', $input);
    }
}
