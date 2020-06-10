<?php

use function PHPSTORM_META\type;

class Teachers extends CI_Controller
{

	public function index() {

		if ($this->session->userdata('lecturer_id')){
			
			$data['courses'] = $this->course_model->get_course_by_lecturer($this->session->userdata('lecturer_id'));
			$data['title'] = "Assigned Courses";

			$this->load->view('templates/header', $data);
			$this->load->view('teachers/home', $data);
			$this->load->view('templates/footer');
		}
		
		else {
			redirect('');
		}
	}

	public function courseDetails($course_id) {
		
		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$data['course'] = $course_id;
		$data['courseDetails'] = $this->course_model->get_courses($course_id)[0];
		$data['teacher'] = $this->teacher_model->get_teacher($data['courseDetails']['lecturer_nic'])[0];
		$data['title'] = "Course Details";

		$this->load->view('templates/header', $data);
		$this->load->view('teachers/course_details', $data);
		$this->load->view('templates/footer');
	}

	public function createAssignment($course_id){

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$input = array(
			'assignment_name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'language' => $this->input->post('language'),
			'course_id' => $course_id,
			'deadline' => $this->input->post('deadline'),
			'time' => $this->input->post('time')
		);
			
		$data['title'] = 'Create new Assignment';	
		$data['course'] = $course_id;
		$data['title'] = "Create Assignment";
		// $this->load->library('form_validation'); 
		$this->form_validation->set_rules('name', 'name' , 'required');
		$this->form_validation->set_rules('description', 'description' , 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('deadline', 'deadline' , 'callback_is_date_correct');
		$this->form_validation->set_rules('time', 'time', 'required');

	
		if($this->form_validation->run() === false){
			$data['inputs'] = $input;
			
			$this->load->view('templates/header', $data);
			$this->load->view('teachers/create_assignment', $data);
			$this->load->view('templates/footer');
	
		}
			
		else{
			
			$last = $this->assignment_model->get_last();
			$last_id = $last[0]['assignment_id']+1;


			$ref_path = "./assets/uploads/" . strval($last_id) . "/reference";

			if(!is_dir($ref_path)) 
			{
			mkdir($ref_path,0755,TRUE);
			} 

			$input_path = "./assets/uploads/" . strval($last_id) . "/input";

			if(!is_dir($input_path)) 
			{
			mkdir($input_path,0755,TRUE);
			} 

			$output_path = "./assets/uploads/" . strval($last_id) . "/output";

			if(!is_dir($output_path)) 
			{
			mkdir($output_path,0755,TRUE);
			} 

			$submit_path = "./assets/uploads/" . strval($last_id) . "/submission";

			if(!is_dir($submit_path)) 
			{
			mkdir($submit_path,0755,TRUE);
			} 

			
			$_FILES['userfile']['name'] = str_replace(" ", "_", $_FILES['userfile']['name']);

				
			move_uploaded_file($_FILES['userfile']['tmp_name'], "./assets/uploads/" . strval($last_id) . "/reference/" . $_FILES['userfile']['name']);
			$input['reference_file'] = $_FILES['userfile']['name'];



			$input['assignment_id'] = $last_id;
			$this->assignment_model->create_assignment($input);
	
			$cases = $this->input->post('test-cases');
	
			for ($i=1; $i<= $cases; $i++) {
				$_FILES['input']['name'][$i-1] = 'input_' . strval($last_id) . '_' . strval($i) . '.txt';
				$_FILES['output']['name'][$i-1]  = 'output_' . strval($last_id) . '_' . strval($i) . '.txt';

				$this->Testcase_model->create(array(
					'assignment_id' => $last_id,
					'case_id' => $i,
					'input_name' => 'input_' . strval($last_id) . '_' . strval($i) . '.txt',
					'output_name' => 'output_' . strval($last_id) . '_' . strval($i) . '.txt'
				));

				move_uploaded_file($_FILES['input']['tmp_name'][$i-1], "./assets/uploads/" . strval($last_id) . "/input/" . $_FILES['input']['name'][$i-1]);
				move_uploaded_file($_FILES['output']['tmp_name'][$i-1], "./assets/uploads/" . strval($last_id) . "/output/" . $_FILES['output']['name'][$i-1]);

			}
			
	
			$this->courseDetails($course_id);
		}
	}


	function is_date_correct($deadline) {
		$date_now = date("Y-m-d");

			$date=$this->input->post('deadline');
	

			if ($date_now > $date) {
				$this->form_validation->set_message('is_date_correct', 'Please give a future date as the {field}.');
				return false;
			}else{
			return true;				}
	}

	public function editAssignment($course_id, $assignment_id, $num) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}
	
		$data['title'] = 'Edit Assignment';
		$data['assignment'] = $this->assignment_model->get_one($assignment_id);
		$data['course_id']  = $course_id;
		$data['num']  = $num;
		$data['title'] = "Edit Assignment";
		// print_r ($data['assignment']);
		$this->load->view('templates/header', $data);
		$this->load->view('teachers/edit_assignment', $data);
		$this->load->view('templates/footer');

}

    public function update($course_id, $assignment_id, $num){

		$this->form_validation->set_rules('deadline', 'deadline' , 'callback_is_date_correct');

		if($this->form_validation->run() === false){
			$this->editAssignment($course_id, $assignment_id, $num);
		}

		else{
			$input = array(
				'assignment_name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'language' => $this->input->post('language'),
				'deadline' => $this->input->post('deadline'),
				'time' => $this->input->post('time')
			);

			// print_r($_FILES);
			$filename = $this->assignment_model->get_file($assignment_id);
			if(!$_FILES['userfile']['name']==''){
				unlink("./assets/uploads/" . strval($assignment_id) . "/reference/" . $filename);
				$_FILES['userfile']['name'] = str_replace(" ", "_", $_FILES['userfile']['name']);
				move_uploaded_file($_FILES['userfile']['tmp_name'], "./assets/uploads/" . strval($assignment_id) . "/reference/" . $_FILES['userfile']['name']);
				$input['reference_file'] = $_FILES['userfile']['name'];
			}
			$this->assignment_model->update_assignment($input, $assignment_id);
			$this->viewSubmissions($assignment_id, $num);
	}
}

	public function viewAssignments($course_id) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$data['assignments'] = $this->assignment_model->get_assignments($course_id);
		$data['courseDetails'] = $this->course_model->get_courses($course_id)[0];
		$data['title'] = "View Assignment";
		// print_r ($data['assignments']);
		$this->load->view('templates/header', $data);
		$this->load->view('teachers/view_assignments', $data);
		$this->load->view('templates/footer');
	}

	public function viewSubmissions($assignment_id, $num, $student_id = NULL) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		if ($student_id) {
			$data['submissions'] = $this->Submission_model->get_submissions($assignment_id, $student_id);
		} else {
			$data['submissions'] = $this->Submission_model->get_submissions($assignment_id);
		}

		$assignment = $this->assignment_model->get_one($assignment_id);
		$data['num'] = $num;
		$data['students'] = $this->student_model->get_student_count($assignment['course_id']);
		$data['assignment'] = $assignment;
		$data['title'] = "Submissions";

		// print_r ($data['assignment']);
		$this->load->view('templates/header', $data);
		$this->load->view('teachers/view_submissions', $data);
		$this->load->view('templates/footer');
	}

	public function download_file($assignment_id, $filename){
		$filepath = "./assets/uploads/" . strval($assignment_id) . "/" . "reference/" . $filename;

		force_download($filepath, NULL);
		// echo $filepath;
	}

	public function download_submission($assignment_id, $filename){
		$filepath = "./assets/uploads/" . strval($assignment_id) . "/" . "submission/" . $filename;

		force_download($filepath, NULL);
		// echo $filepath;
	}

	public function searchSubmission($assignment_id, $num) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$student_id = $this->input->post('search-student');
		$this->viewSubmissions($assignment_id, $num, $student_id);

	}

	public function grade($assignment_id, $num) {

		if ($this->session->userdata('lecturer_id')){
			$data['title'] = "Grade";

			$thres = $this->input->post('uniqueness');
			$language = strtolower($this->assignment_model->getLang($assignment_id));
			$input_data = $this->Testcase_model->getInput($assignment_id);
			$output_data = $this->Testcase_model->getOutput($assignment_id);
			$submission_data = $this->Submission_model->getFiles($assignment_id);

			$submissions=[];
			foreach($submission_data as $data){
				$submissions[$data['student_id']] = base64_encode(file_get_contents("./assets/uploads/" . strval($assignment_id) . "/submission/" . $data['file_path'])); 
			}

			$inputs=[];
			foreach($input_data as $data){
				$inputs[strval($data['case_id'])] = base64_encode(file_get_contents("./assets/uploads/" . strval($assignment_id) . "/input/" . $data['input_name'])); 
			}

			$outputs=[];
			foreach($output_data as $data){
				$outputs[strval($data['case_id'])] = base64_encode(file_get_contents("./assets/uploads/" . strval($assignment_id) . "/output/" . $data['output_name'])); 
			}

			$url = 'https://client-specific-api.herokuapp.com/result';

			$client_id = 'kogul';
			$client_secret = 'kogul17';

			$postfields = array(
				'assignment_id' => strval($assignment_id),
				'threshold' => $thres,
				'lang' => $language,
				'input' => $inputs,
				'output' => $outputs,
				'submissions' => $submissions,
			  );

			//   print_r($postfields);
			  $options = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_POSTFIELDS => json_encode($postfields),
				CURLOPT_HTTPHEADER => array("Content-Type:application/json", "Authorization: Basic " . base64_encode("$client_id:$client_secret")),
			  );
			  
			  $ch = curl_init();
			  curl_setopt_array($ch, $options);
			  $content = curl_exec($ch);
			  $json = json_decode($content, true);
			

			$this->assignment_model->changeStatus($assignment_id, 1);
			$this->viewSubmissions($assignment_id, $num);
			
		} 
		
		else {
			redirect('login');
		}
	}

	public function viewStudents($course_id, $student_id = NULL) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		if ($student_id) {
			$data['students'] = $this->student_model->search_student($student_id, $course_id);
		} else {
			$data['students'] = $this->student_model->get_students($course_id);
		}

		$data['count'] = $this->student_model->get_student_count($course_id);
		$data['course_id'] = $course_id;
		$data['title'] = "View Students";
		// print_r ($data['students']);

		$this->load->view('templates/header', $data);
		$this->load->view('teachers/view_students', $data);
		$this->load->view('templates/footer');

	}

	public function searchStudent($course_id) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$student_id = $this->input->post('search-student');
		$this->viewStudents($course_id, $student_id);

	}

	public function profile() {

		if(!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$data['message'] = "";
		$lecturer_id = $this->session->userdata('lecturer_id');

		$this->form_validation->set_rules('new_pass', 'New Password' , 'required');
		$this->form_validation->set_rules('renew_pass', 'Re-New Password' , 'required');

		if($this->form_validation->run() === TRUE){

			$new_pass = $this->input->post('new_pass');	
			$renew_pass = $this->input->post('renew_pass');	

			if ($new_pass == $renew_pass) {
				$data['message'] = "Password changed successfully.";
				$this->teacher_model->change_password($lecturer_id, md5($new_pass));	
			} else {
				$data['message'] = "Passwords mismatched.";
			}
		}

		$data['teacher'] = $this->teacher_model->get_teacher($lecturer_id)[0];
		$data['password'] = $this->teacher_model->get_password($lecturer_id);
		$data['title'] = "Profile";

		$this->load->view('templates/header', $data);
		$this->load->view('teachers/profile', $data);	
		$this->load->view('templates/footer');

	}

	public function view_issues($assignment_id){
     

		$data['title'] = 'Issues reported by students';
		$data['issues'] = $this->issue_model->get_issues($assignment_id);
		$data['title'] = "View Issues";

		$this->load->view('templates/header', $data);
		$this->load->view('assignments/issues', $data);
		$this->load->view('templates/footer');
	
	}
}
