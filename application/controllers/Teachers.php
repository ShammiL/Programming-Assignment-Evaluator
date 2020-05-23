<?php
class Teachers extends CI_Controller
{

	public function index() {

		if ($this->session->userdata('lecturer_id')){
			
			$data['courses'] = $this->course_model->get_course_by_lecturer($this->session->userdata('lecturer_id'));

			$this->load->view('templates/header');
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

		$this->load->view('templates/header');
		$this->load->view('teachers/course_details', $data);
		$this->load->view('templates/footer');
	}

	public function createAssignment($course_id){

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}
			
		$data['title'] = 'Create new Assignment';	
		$data['course'] = $course_id;
		// $this->load->library('form_validation'); 
		$this->form_validation->set_rules('name', 'name' , 'required');
		$this->form_validation->set_rules('description', 'description' , 'required');
		$this->form_validation->set_rules('language', 'Language', 'required');
		$this->form_validation->set_rules('deadline', 'deadline' , 'callback_is_date_correct');
		$this->form_validation->set_rules('time', 'time', 'required');

	
		if($this->form_validation->run() === false){
			
			$this->load->view('templates/header');
			$this->load->view('teachers/create_assignment', $data);
			$this->load->view('templates/footer');
	
		}
			
		else{

			$input = array(
				'assignment_name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'language' => $this->input->post('language'),
				'course_id' => $course_id,
				'deadline' => $this->input->post('deadline'),
				'time' => $this->input->post('time'),
				'status' => 'ongoing'
			);
			
			$config['upload_path'] = './assets/uploads/reference docs';
			$config['allowed_types'] = 'pdf|doc|zip|rar';
			$config['max_size'] = '.2048';
	
			$this->load->library('upload', $config);
	
			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				
			}
			else{
				$file_data = array('upload_data' => $this->upload->data());
				$input['reference_file'] = $_FILES['userfile']['name'];
			}
			$this->assignment_model->create_assignment($input);
	
			// $cases = $this->input->post('test-cases');
	
			// for ($i=1; $i<= $cases; $i++) {
			// 	$this->Testcase_model->create(array(
			// 		'assignment_id' => 2,
			// 		'test_case_no' => $i,
			// 		'input' => $this->input->post('input'.$i),
			// 		'output' => $this->input->post('output'.$i)
			// 	));
			// }
	
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
		// print_r ($data['assignment']);
		$this->load->view('templates/header');
		$this->load->view('teachers/edit_assignment', $data);
		$this->load->view('templates/footer');
	}

    public function update($course_id, $assignment_id, $num){

        $input = array(
            'assignment_name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'language' => $this->input->post('language'),
            'deadline' => $this->input->post('deadline'),
        );
        $this->assignment_model->update_assignment($input, $assignment_id);
		$this->viewSubmissions($assignment_id, $num);
    }

	public function viewAssignments($course_id) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$data['assignments'] = $this->assignment_model->get_assignments($course_id);
		$data['courseDetails'] = $this->course_model->get_courses($course_id)[0];
		// print_r ($data['assignments']);
		$this->load->view('templates/header');
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

		// print_r ($data['assignment']);
		$this->load->view('templates/header');
		$this->load->view('teachers/view_submissions', $data);
		$this->load->view('templates/footer');
	}

	public function searchSubmission($assignment_id, $num) {

		if (!$this->session->userdata('lecturer_id')){
			redirect('');
		}

		$student_id = $this->input->post('search-student');
		$this->viewSubmissions($assignment_id, $num, $student_id);

	}

	public function grade() {

		if ($this->session->userdata('lecturer_id')){

			$this->load->view('templates/header');
			$this->load->view('teachers/grade');
			$this->load->view('templates/footer');
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
			$data['students'] = $this->student_model->get_students($course_id, $student_id);
		} else {
			$data['students'] = $this->student_model->get_students($course_id);
		}

		$data['count'] = $this->student_model->get_student_count($course_id);
		$data['course_id'] = $course_id;
		// print_r ($data['students']);

		$this->load->view('templates/header');
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

		$this->load->view('templates/header');
		$this->load->view('teachers/profile', $data);	
		$this->load->view('templates/footer');

	}
}
