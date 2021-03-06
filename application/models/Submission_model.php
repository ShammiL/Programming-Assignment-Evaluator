<?php
class Submission_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_submissions($assignment_id, $student_id=NULL){

        if ($student_id) {
        	$this->db->where('assignment_id', $assignment_id);
        	$this->db->like('student_id', $student_id);
            $query = $this->db->get('submissions');
        } else {
            $query = $this->db->get_where('submissions', array('assignment_id'=>$assignment_id));
        }
        
        return $query->result_array();    
    }

    function checkForSubmission($assignment_id,$student_id){

        $this->db->where('assignment_id',$assignment_id);
        $this->db->where('student_id',$student_id);

        $result = $this->db->get('submissions');

        if($result->num_rows() > 0){
			return array(
				'submitted_at' => $result->row(0)->submitted_at,
				'filepath' => $result->row(0)->file_path,
				'submitted' => true
			);
        } else {
            return array(
				'submitted_at' => '---',
				'submitted' => FALSE
			);
        }
    }

    function makeSubmission($data){
        
        $this->db->insert('submissions',$data);

        // $this->db->where($data);
        // return $this->db->get('submissions')->row(0)->submission_id;
    }

    function updateSubmission($assignment_id, $student_id,$data){

        $this->db->where('assignment_id', $assignment_id);
        $this->db->where('student_id', $student_id);
        return $this->db->update('submissions', $data);

    }

    function setGrade($assignment_id, $indexNumber, $grade) {

    	$this->db->where(array('assignment_id' => $assignment_id, 'student_id' => $indexNumber));
		return $this->db->update('submissions', array('grade' => $grade));

	}

    public function get_file($assignment_id, $student_id){
       
        $this->db->where('assignment_id',$assignment_id);
        $this->db->where('student_id', $student_id);
        return $this->db->get('submissions')->row(0)->file_path;

    }

    function deleteSubmission($id){
        $this->db->where('submission_id', $id);
        return $this->db->delete('submissions');
    }

    function getFiles($assignment_id){
        $this->db->select('student_id, file_path');
        $this->db->from('submissions');
        $this->db->where('assignment_id', $assignment_id);
        $result = $this->db->get();
        return $result->result_array();

    }
}
