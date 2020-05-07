<?php
	
	class assignment_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		function checkStatus($id){

			$this->db->where('assignment_id',$id);
			$status = $this->db->get('assignment')->row(0)->status;
			if( $status == 'over'){
				return FALSE;
			} else {
				return TRUE;
			}
		}

		function checkForSubmission($assignment_id,$student_id){

			$this->db->where('assignment_id',$assignment_id);
			$this->db->where('student_id',$student_id);

			$result = $this->db->get('submission');

			if($result->num_rows() > 0){
				return TRUE;
			} else {
				return FALSE;
			}
		}

		function getGrade($assignment_id,$student_id){

			$this->db->where('assignment_id',$assignment_id);
			$this->db->where('student_id',$student_id);

			return $this->db->get('submission')->row(0)->grade;
		}

		function getLang($assignment_id){

			$this->db->where('assignment_id',$assignment_id);
			$lang = $this->db->get('assignment')->row(0)->language;

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
			$this->db->insert('submission',$data);

			$this->db->where($data);
			$id = $this->db->get('submission')->row(0)->submission_id;
			return $id;
		}

		function updateSubmission($id,$filepath){

			$this->db->set('filepath',$filepath);
			$this->db->where('submission_id',$id);

			$this->db->update('submission');

		}

		function deleteSubmission($id){
			$this->db->where('submission_id', $id);
			$this->db->delete('submission');
		}
	}