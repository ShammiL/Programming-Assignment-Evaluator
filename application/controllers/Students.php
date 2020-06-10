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
			$data['title'] = "My Courses";

			$this->load->view('templates/student_header',$data);
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
		$data['courseDetails'] = $this->course_model->get_courses($course_id)[0];
		$data['teacher'] = $this->teacher_model->get_teacher($data['courseDetails']['lecturer_nic'])[0];

		if ($this->student_model->checkEnrollment($indexNumber,$course_id)){
			
			$data['assignments'] = $this->assignment_model->get_assignments($course_id);
			$data['title'] = "View Course";

			$this->load->view('templates/student_header',$data);
			$this->load->view('students/view_assignments',$data);
			$this->load->view('templates/footer');

		} else {
			$data['title'] = "Enroll Course";

			$this->load->view('templates/student_header',$data);
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
		$submission_data = $this->Submission_model->checkForSubmission($assignment_id,$student_id);
		//echo $status;
		
		//echo $this->assignment_model->checkForSubmission('1','170307M');
		
		//echo $assignment_id;

		switch ($status) {
			case -1:
				$data['deadline'] = FALSE;
				$data['graded'] = FALSE;
				if ($submission_data['submitted']) {
					$data['submitted'] = TRUE;
					$data['last'] = $submission_data['filepath'];
					$data['last_modified'] = explode(' ', $submission_data['submitted_at'])[0] . ', ' . strval(date("g:i a", strtotime(explode(' ', $submission_data['submitted_at'])[1])));
				} else {
					$data['submitted'] = FALSE;
					$data['last'] = "";
					$data['last_modified'] = $submission_data['submitted_at'];
				}
				break;
			case 0 :
			case 1:
				$data['deadline'] = TRUE;
				$data['graded'] = FALSE;
				if ($submission_data['submitted']) {
					$data['submitted'] = TRUE;
					$data['last'] = $submission_data['filepath'];
					$data['last_modified'] = explode(' ', $submission_data['submitted_at'])[0] . ', ' . strval(date("g:i a", strtotime(explode(' ', $submission_data['submitted_at'])[1])));
				} else {
					$data['submitted'] = FALSE;
					$data['last'] = "";
					$data['last_modified'] = $submission_data['submitted_at'];
				}
				break;
			case 2:
				$data['deadline'] = TRUE;
				if ($submission_data['submitted']) {
					$data['graded'] = TRUE;
					$data['submitted'] = TRUE;
					$data['last'] = $submission_data['filepath'];
					$data['last_modified'] = explode(' ', $submission_data['submitted_at'])[0] . ', ' . strval(date("g:i a", strtotime(explode(' ', $submission_data['submitted_at'])[1])));
				} else {
					$data['graded'] = FALSE;
					$data['submitted'] = FALSE;
					$data['last'] = "";
					$data['last_modified'] = $submission_data['submitted_at'];
				}
				break;
		}

//		if($status == 1){
//
//			$data['deadline'] = FALSE;
//			if($submission_data['submitted']){
//				$data['graded'] = FALSE;
//				$data['submitted'] = TRUE;
//				$data['last'] = $submission_data['filepath'];
//				$data['last_modified'] = explode(' ', $submission_data['submitted_at'])[0] . ', ' . strval(date("g:i a", strtotime(explode(' ', $submission_data['submitted_at'])[1])));
//			} else {
//				$data['submitted'] = FALSE;
//				$data['graded'] = FALSE;
//				$data['last'] = "";
//				$data['last_modified'] = $submission_data['submitted_at'];
//			}
//		} else {
//			$data['deadline'] = TRUE;
//			if($submission_data['submitted']){
//				$data['graded'] = TRUE;
//				$data['submitted'] = TRUE;
//				$data['last'] = $submission_data['filepath'];
//				$data['last_modified'] = explode(' ', $submission_data['submitted_at'])[0] . ', ' . strval(date("g:i a", strtotime(explode(' ', $submission_data['submitted_at'])[1])));
//
//			} else {
//				$data['graded'] = FALSE;
//				$data['submitted'] = FALSE;
//				$data['last'] = "";
//				$data['last_modified'] = $submission_data['submitted_at'];
//
//			}
//		}

		$data['assignment_id'] = $assignment_id;
		$data['indexNumber'] = $student_id;
		$data['num'] = $num;
		$data['error'] = $data1;
		$data['assignment_data'] = $this->assignment_model->get_one($assignment_id);
		$data['title'] = "Add Submission";

		$this->load->view('templates/student_header',$data);
		$this->load->view('students/viewSubmission',$data);
		$this->load->view('templates/footer');

	}

	public function download_file($assignment_id, $filename){
		$filepath = "./assets/uploads/" . strval($assignment_id) . "/" . "reference/" . $filename;

		force_download($filepath, NULL);
		// echo $filepath;
	}

	public function viewGrade ($assignment_id, $num){

		if ($this->session->userdata('student_id')){

			$data['assignment_id'] = $assignment_id;
			$data['num'] = $num;
			$data['assignment_data'] = $this->assignment_model->get_one($assignment_id);
			$data['grade'] = $this->assignment_model->getGrade($assignment_id, $this->session->userdata('student_id'));
			$data['title'] = "View Grade";

			$this->load->view('templates/student_header',$data);
			$this->load->view('students/view_grade', $data);
			$this->load->view('templates/footer');

		} else {
			redirect('');
		}
	}

	function makeSubmission($assignment_id,$num){

		if(!$this->session->userdata('student_id')){
			redirect('');
		}

		$student_id = $this->session->userdata('student_id');
		//C:\xampp\htdocs\myapp\submissions
		$lang = $this->assignment_model->getLang($assignment_id);
		$config['upload_path'] = "./assets/uploads/" . strval($assignment_id) . "/submission";
//		$config['allowed_types'] = $lang;

		$_FILES['userfile']['name'] = str_replace(" ", "_", $_FILES['userfile']['name']);
		$_FILES['userfile']['name'] = $student_id . '_' . $_FILES['userfile']['name'];

		date_default_timezone_set('Asia/Colombo');

		$data = array(
			'assignment_id' => $assignment_id,
			'student_id' => $student_id,
			'file_path' => $_FILES['userfile']['name'],
			'submitted_at' => strval(date("Y-m-d H:i:s"))
		);

		// $this->load->library('upload',$config);

		// if($this->upload->do_upload()){

		$this->Submission_model->makeSubmission($data);
			//echo $this->upload->display_errors();
			//$this->assignmentDetails($assignment_id,$num);
		move_uploaded_file($_FILES['userfile']['tmp_name'], "./assets/uploads/" . strval($assignment_id) . "/submission/" . $_FILES['userfile']['name']);

		$this->assignmentDetails($assignment_id,$num);
		// } else {
		// 	//$this->assignmentDetails($assignment_id,$num);
		// 	$data = "The file upload was unsuccessful.<br>The file was not written in the expected language.<br>If you have uploaded the correct file please try again.";
		// 	$this->assignmentDetails($assignment_id,$num,$data);
		// }
	}

	public function updateSubmission($assignment_id,$num){

		if(!$this->session->userdata('student_id')){
			redirect('');
		}

		$student_id = $this->session->userdata('student_id');
		//C:\xampp\htdocs\myapp\submissions
		// $lang = $this->assignment_model->getLang($assignment_id);
		$config['upload_path'] = "./assets/uploads/" . strval($assignment_id) . "/submission";
//		$config['allowed_types'] = $lang;

		$_FILES['userfile']['name'] = str_replace(" ", "_", $_FILES['userfile']['name']);
		$_FILES['userfile']['name'] = $student_id . '_' . $_FILES['userfile']['name'];

		date_default_timezone_set('Asia/Colombo');


		$data = array(
			'file_path' => $_FILES['userfile']['name'],
			'submitted_at' => strval(date("Y-m-d H:i:s"))
		);

		$this->load->library('upload',$config);

		// if($this->upload->do_upload()){
		$filename = $this->Submission_model->get_file($assignment_id, $student_id);
		$this->Submission_model->updateSubmission($assignment_id, $student_id, $data);
		unlink("./assets/uploads/" . strval($assignment_id) . "/submission/" . $filename);
		move_uploaded_file($_FILES['userfile']['tmp_name'], "./assets/uploads/" . strval($assignment_id) . "/submission/" . $_FILES['userfile']['name']);

			//echo $this->upload->display_errors();
			//$this->assignmentDetails($assignment_id,$num);
		$this->assignmentDetails($assignment_id,$num);
		// } else {
		// 	//$this->assignmentDetails($assignment_id,$num);
		// 	$data = "The file upload was unsuccessful.<br>The file was not written in the expected language.<br>If you have uploaded the correct file please try again.";
		// 	$this->assignmentDetails($assignment_id,$num,$data);
		// }
	}

	public function download_submission($assignment_id, $filename){

		if(!$this->session->userdata('student_id')){
			redirect('');
		}

		$filepath = "./assets/uploads/" . strval($assignment_id) . "/" . "submission/" . $filename;

		force_download($filepath, NULL);
		// echo $filepath;
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

		$data['student'] = $this->student_model->get_all_students($index_number)[0];
		$data['password'] = $this->student_model->get_password($index_number);
		$data['title'] = "My Profile";

		$this->load->view('templates/student_header',$data);
		$this->load->view('students/profile', $data);	
		$this->load->view('templates/footer');

	}

	public function report_issue($assignment_id){

		if (!$this->session->userdata('student_id')){
			redirect('');
		}

		$input = array(
			'assignment_id' => $assignment_id,
			'indexNumber' => $this->session->userdata('student_id'),
			'content' => $this->input->post('content')
			
		);

		$data['assignment_id'] = $assignment_id;	

		$this->form_validation->set_rules('content', 'content' , 'required');
		
	
		if($this->form_validation->run() === false){

			$data['inputs'] = $input;
			$data['title'] = "Report Issue";
			
			$this->load->view('templates/student_header',$data);
			$this->load->view('students/report_issue', $data);
			$this->load->view('templates/footer');
	
		}
			
		else{


			$this->issue_model->create_issue($input);
	
			$this->view_issues($this->session->userdata('student_id'), $assignment_id);
		
	}
}

	public function view_issues($assignment_id){

		if(!$this->session->userdata('student_id')){
			redirect('');
		}

		$data['issues'] = $this->issue_model->get_issues_student($this->session->userdata('student_id'), $assignment_id);
		$data['title'] = "View Issues";

		$this->load->view('templates/student_header',$data);
		$this->load->view('students/view_issues', $data);
		$this->load->view('templates/footer');
	}

	// public function view1($course_id = "CS3020"){

	// 	$data['title'] = ucfirst('Students following '. $course_id);
	// 	// print_r ($data['title']);

	// 	$data['students'] = $this->Student_model->get_students($course_id);
	// 	$data['count'] = $this->Student_model->get_student_count($course_id);
	// 	// print_r ($data['students']);

	// 	$this->load->view('templates/student_header',$data);
	// 	$this->load->view('students/view', $data);
	// 	$this->load->view('templates/footer');

	// }

	// public function search($course_id = "CS3020") {

	// 	$id = $this->input->post('search-student');

	// 	$data['students'] = $this->Student_model->get_students($course_id, $id);
	// 	$data['count'] = $this->Student_model->get_student_count($course_id);
	// 	// print_r ($data['students']);

	// 	$this->load->view('templates/student_header',$data);
	// 	$this->load->view('students/view', $data);
	// 	$this->load->view('templates/footer');

	// }

}
