<?php
class Assignment_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    function checkStatus($id){

        $this->db->where('assignment_id',$id);
        $status = $this->db->get('assignments')->row(0)->status;
        if( $status == 'finished'){
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
            $sub_data = array(
                'submitted_at' => $result->row(0)->submitted_at,
                'filepath' => $result->row(0)->file_path,
                'submitted' => true
            );
            return $sub_data;
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

        if($lang === 'Python' or $lang === 'Python3'){
            return 'py';
        } else if ($lang == 'Java'){
            return 'java';
        } else if ($lang == 'C++'){
            return 'cpp';
        } else {
            return 'js';
        }
    }

    function makeSubmission($data){
        
        $this->db->insert('submissions',$data);

        // $this->db->where($data);
        // return $this->db->get('submissions')->row(0)->submission_id;
    }

    function updateSubmission($id,$filepath){

        $this->db->set('file_path',$filepath);
        $this->db->where('submission_id',$id);

        return $this->db->update('submissions');

    }

    function deleteSubmission($id){
        $this->db->where('submission_id', $id);
        return $this->db->delete('submissions');
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
}
