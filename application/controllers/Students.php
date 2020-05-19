<?php
class Students extends CI_Controller{

	function index(){

		if($this->session->userdata('student_id')){

			$indexNumber = $this->session->userdata('student_id');
			$data['index_courses'] = $this->student_model->getCoursesByIndex($indexNumber);
			$sem_courses = $this->student_model->getCoursesBySemester($indexNumber);

			$data['sem_courses'] = [];
			$course_ids = [];
			foreach($data['index_courses'] as $course){
				array_push($course_ids, $course[0]['course_id']);
			}

			foreach($sem_courses as $c){
				if (!in_array($c['course_id'], $course_ids)){
					array_push($data['sem_courses'], $c);
				} 
			}
				// print_r($data['sem_courses']);
			
			
			// print_r($course_ids);

			// echo('enrolled in: \n');
			// print_r($data['index_courses']);


			$this->load->view('templates/student_header');
			$this->load->view('students/view_courses',$data);
			$this->load->view('templates/footer');
		
		}
	
		 else {
			redirect('');
		}
	}

	function courseDetails($id){

		$course_id = $id;
		if(!$this->session->userdata('student_id')){
			redirect('');
		}

		$indexNumber = $this->session->userdata('student_id');

		if ($this->student_model->checkEnrollment($indexNumber,$course_id)){
			$data['assignments'] = $this->course_model->getAssignments($course_id);
			$data['courseDetails'] = $this->course_model->get_course_details($course_id);
			$data['teacher'] = $this->teacher_model->get_teacher($data['courseDetails']->lecturer_nic);

			$this->load->view('templates/student_header');
			$this->load->view('students/view_assignments',$data);
			$this->load->view('templates/footer');

		} else {

			$data['id'] = $course_id;
			$this->load->view('templates/student_header');
			$this->load->view('students/enroll_course',$data);
			$this->load->view('templates/footer');
		}
		
	}

	function enrollCourse($course_id){
		$student_id = $this->session->userdata('student_id');
		$this->student_model->enrollCourse($student_id, $course_id);
		redirect('student/courseDetails/' . $course_id);
	}

	function assignmentDetails($assignment_id, $num, $data1=NULL){

		if(!$this->session->userdata('student_id')){
			redirect('');
		}
		
		$student_id = $this->session->userdata('student_id');
		$status = $this->assignment_model->checkStatus($assignment_id);
		$submissionCheck = $this->assignment_model->checkForSubmission($assignment_id,$student_id);
		//echo $status;
		
		//echo $this->assignment_model->checkForSubmission('1','170307M');
		
		//echo $assignment_id;

		if($status){
			$data['deadline'] = FALSE;
			if($submissionCheck){
				$data['graded'] = FALSE;
				$data['submitted'] = TRUE;
			} else {
				$data['submitted'] = FALSE;
				$data['graded'] = FALSE;
			}
		} else {
			$data['deadline'] = TRUE;
			if($submissionCheck){
				$data['graded'] = TRUE;
				$data['submitted'] = TRUE;
			} else {
				$data['graded'] = FALSE;
				$data['submitted'] = FALSE;
			}
		}

		$data['assignment_id'] = $assignment_id;
		$data['num'] = $num;
		$data['error'] = $data1;
		$data['assignment_data'] = $this->assignment_model->get_one($assignment_id);

		$this->load->view('templates/student_header');
		$this->load->view('students/viewSubmission',$data);
		$this->load->view('templates/footer');

	}

	public function viewGrade ($assignment_id, $num){

		if ($this->session->userdata('student_id')){

			$data['assignment_id'] = $assignment_id;
			$data['num'] = $num;
			$data['assignment_data'] = $this->assignment_model->get_one($assignment_id);
			$data['grade'] = $this->assignment_model->getGrade($assignment_id, $this->session->userdata('student_id'));

			$this->load->view('templates/student_header');
			$this->load->view('students/view_grade', $data);
			$this->load->view('templates/footer');

		} else {
			redirect('');
		}
	}

	function makeSubmission($assignment_id,$num){

		$student_id = $this->session->userdata('student_id');
		//C:\xampp\htdocs\myapp\submissions
		$lang = $this->assignment_model->getLang($assignment_id);
		$config['upload_path'] = './submissions/';
		$config['allowed_types'] = $lang;

		$id = $this->assignment_model->makeSubmission($student_id,$assignment_id);
		$config['file_name'] = $id;

		$this->load->library('upload',$config);

		if($this->upload->do_upload('userfile')){

			$filepath = 'C:/xampp/htdocs/Programming-Assignment-Evaluator/submissions/'.$id;
			$this->assignment_model->updateSubmission($id,$filepath);
			//echo $this->upload->display_errors();
			//$this->assignmentDetails($assignment_id,$num);
			$this->assignmentDetails($assignment_id,$num);
		} else {
			//$this->assignmentDetails($assignment_id,$num);
			$data = "The file upload was unsuccesssful.<br>Either the file was not written in the expected language, if so please do so.<br>If you have uploaded the correct file please try again later.";
			$this->assignment_model->deleteSubmission($id);
			$this->assignmentDetails($assignment_id,$num,$data);
		}
	}

	public function profile() {

		if(!$this->session->userdata('student_id')){
			redirect('');
		}

		$data['message'] = "";
		$index_number = $this->session->userdata('student_id');

		$this->form_validation->set_rules('new_pass', 'New Password' , 'required');
		$this->form_validation->set_rules('renew_pass', 'Re-New Password' , 'required');

		if($this->form_validation->run() === TRUE){

			$new_pass = $this->input->post('new_pass');	
			$renew_pass = $this->input->post('renew_pass');	

			if ($new_pass == $renew_pass) {
				$data['message'] = "Password changed successfully.";
				$this->student_model->change_password($this->session->userdata('student_id'), md5($new_pass));	
			} else {
				$data['message'] = "Passwords mismatched.";
			}
		}

		$data['student'] = $this->student_model->get_all_students($index_number);
		$data['password'] = $this->student_model->get_password($index_number);

		$this->load->view('templates/student_header');
		$this->load->view('students/profile', $data);	
		$this->load->view('templates/footer');

	}
	// public function view1($course_id = "CS3020"){

	// 	$data['title'] = ucfirst('Students following '. $course_id);
	// 	// print_r ($data['title']);

	// 	$data['students'] = $this->Student_model->get_students($course_id);
	// 	$data['count'] = $this->Student_model->get_student_count($course_id);
	// 	// print_r ($data['students']);

	// 	$this->load->view('templates/student_header');
	// 	$this->load->view('students/view', $data);
	// 	$this->load->view('templates/footer');

	// }

	// public function search($course_id = "CS3020") {

	// 	$id = $this->input->post('search-student');

	// 	$data['students'] = $this->Student_model->get_students($course_id, $id);
	// 	$data['count'] = $this->Student_model->get_student_count($course_id);
	// 	// print_r ($data['students']);

	// 	$this->load->view('templates/student_header');
	// 	$this->load->view('students/view', $data);
	// 	$this->load->view('templates/footer');

	// }

}
