<?php
class Assignment_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    function checkStatus($id){

        $this->db->where('assignment_id',$id);
		return $this->db->get('assignments')->row(0)->status;
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

    function getLang($assignment_id){

        $this->db->where('assignment_id',$assignment_id);
        return $this->db->get('assignments')->row(0)->language;

        // if($lang === 'Python' or $lang === 'Python3'){
        //     return 'py';
        // } else if ($lang == 'Java'){
        //     return 'java';
        // } else if ($lang == 'C++'){
        //     return 'cpp';
        // } else {
        //     return 'js';
        // }
    }

    

    function getGrade($assignment_id,$student_id){

        $this->db->where('assignment_id',$assignment_id);
        $this->db->where('student_id',$student_id);

        return $this->db->get('submissions')->row(0)->grade;
    }

    public function get_one($assignment_id = 1){
       
        // $query = $this->db->get('students');
        $this->db->select('*');
        $this->db->from('assignments');
        $this->db->where('assignment_id', $assignment_id);
        $result = $this->db->get();

		if($result->num_rows() > 0){
			return $result->result_array()[0];
		} else {
			return FALSE;
		}

    }

    public function get_file($assignment_id = 1){
       
        $this->db->where('assignment_id',$assignment_id);
        return $this->db->get('assignments')->row(0)->reference_file;

    }

    public function create_assignment($input){

        return $this->db->insert('assignments', $input);
    }

    public function update_assignment($input, $id){

        $this->db->where('assignment_id', $id);
        return $this->db->update('assignments', $input);
    }

    public function get_last(){
        $last = $this->db->order_by('assignment_id',"desc")->limit(1)->get('assignments')->result_array();

        return $last;
    }

    function changeStatus($assignment_id, $status){

        $this->db->set('status', $status);
        $this->db->where('assignment_id', $assignment_id);
        $this->db->update('assignments');

    }

}
