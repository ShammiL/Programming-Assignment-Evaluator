<?php
class Assignment_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    function checkStatus($id){

        $this->db->where('assignment_id',$id);
        $status = $this->db->get('assignments')->row(0)->status;
        if( $status == 'over'){
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function checkForSubmission($assignment_id,$student_id){

        $this->db->where('assignment_id',$assignment_id);
        $this->db->where('student_id',$student_id);

        $result = $this->db->get('submissions');

        if($result->num_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
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
        $lang = $this->db->get('assignments')->row(0)->language;

        if($lang === 'Python'){
            return 'py';
        } else if ($lang == 'Java'){
            return 'java';
        } else if ($lang == 'C++'){
            return 'cc';
        } else {
            return 'js';
        }
    }

    function makeSubmission($student_id,$assignment_id){
        $data = array(
                    'student_id' => $student_id,
                    'assignment_id' => $assignment_id
                );
        $this->db->insert('submissions',$data);

        $this->db->where($data);
        $id = $this->db->get('submissions')->row(0)->submission_id;
        return $id;
    }

    function updateSubmission($id,$filepath){

        $this->db->set('filepath',$filepath);
        $this->db->where('submission_id',$id);

        $this->db->update('submission');

    }

    function deleteSubmission($id){
        $this->db->where('submission_id', $id);
        $this->db->delete('submissions');
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
