<?php
class Admins extends CI_Controller{

	public function index(){

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$admin_id = $this->session->userdata('admin_id');
		$data['courses'] = $admin_id;
		$data['course_count'] = $this->course_model->get_course_count();
		$data['student_count'] = $this->student_model->get_student_count();
		$data['teacher_count'] = $this->teacher_model->get_teacher_count();

		$this->load->view('templates/admin_header');
		$this->load->view('admins/home', $data);
		$this->load->view('templates/footer');
	}
	
	public function addCourse() {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$this->form_validation->set_rules('id', 'Course ID' , 'required|is_unique[courses.course_id]', array('is_unique' => 'The %s you entered is already exists in the system.'));
		$this->form_validation->set_rules('description', 'Description' , 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_error_delimiters('<div class="change-password-wrong mb-5">', '</div>'); 

		if($this->form_validation->run() === false){

			$data['teachers'] = $this->teacher_model->get_teacher();

			$this->load->view('templates/admin_header');
			$this->load->view('admins/add_course', $data);
			$this->load->view('templates/footer');	
		}
			
		else{

			$input = array(
				'course_id' => $this->input->post('id'),
				'course_name' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'lecturer_nic' => $this->input->post('teacher'),
				'semester' => $this->input->post('teacher')
			);
			
			$this->course_model->create_course($input);	
			$this->index();
		}
	}

	public function viewCourse($course_id = NULL) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$data['courses'] = $this->course_model->get_courses($course_id);
		$data['count'] = $this->course_model->get_course_count();

		$this->load->view('templates/admin_header');
		$this->load->view('admins/view_courses', $data);
		$this->load->view('templates/footer');	
	}

	public function editCourse($course_id) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$data['message'] = "";

		$this->form_validation->set_rules('title', 'Course Title' , 'required');
		$this->form_validation->set_rules('desc', 'Course Description', 'required');

		if($this->form_validation->run() === TRUE){

			$input = array(
				'course_name' => $this->input->post('title'),
				'description' => $this->input->post('desc'),
				'lecturer_nic' => $this->input->post('lecturer_id'),
				'semester' => $this->input->post('semester')
			);
			
			$data['message'] = $this->course_model->update_course($course_id, $input);	
		}

		$data['course'] = $this->course_model->get_courses($course_id)[0];
		$data['teacher'] = $this->teacher_model->get_teacher($data['course']['lecturer_nic'])[0];
		$data['teachers'] = $this->teacher_model->get_teacher();

		$this->load->view('templates/admin_header');
		$this->load->view('admins/edit_course', $data);
		$this->load->view('templates/footer');	
	}

	public function searchCourse() {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$course_id = $this->input->post('search-course');
		$this->viewCourse($course_id);

	}
	
	public function addStudent() {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$this->form_validation->set_rules('index', 'Index Number' , 'required|is_unique[students.indexNumber]', array('is_unique' => 'The %s you entered is already exists in the system.'));
		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email|is_unique[students.email]', array('is_unique' => 'The %s you entered is already exists in the system.'));
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_rules('phone', 'Telephone Number', 'regex_match[/^[0-9]{10}$/]', array('regex_match' => 'The %s you entered is invalid.'));
		$this->form_validation->set_error_delimiters('<div class="change-password-wrong mb-5">', '</div>'); 

		if($this->form_validation->run() === false){

			$this->load->view('templates/admin_header');
			$this->load->view('admins/add_student');
			$this->load->view('templates/footer');	
		}
			
		else{

			$semester = $this->input->post('semester');
			if ($semester == "") {
				$semester = "1";
			}

			$input = array(
				'indexNumber' => $this->input->post('index'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'semester' => $semester,
				'birthday' => $this->input->post('bday'),
				'gender' => $this->input->post('gender'),
				'nationality' => $this->input->post('nationality')
			);

			$signup_data = array(
				'indexNumber' => $this->input->post('index'), 
				'password' => md5("1234")
			);
			
			$this->student_model->signup_student($signup_data);	
			$this->student_model->add_student($input);	
			$this->index();
		}
	}

	public function viewStudent($student_id = NULL) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$data['students'] = $this->student_model->get_all_students($student_id);
		$data['count'] = $this->student_model->get_student_count();
		
		$this->load->view('templates/admin_header');
		$this->load->view('admins/view_students', $data);
		$this->load->view('templates/footer');	
	}

	public function editStudent($index_number) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$data['message'] = "";

		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email');
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_rules('phone', 'Telephone Number', 'regex_match[/^[0-9]{10}$/]', array('regex_match' => 'The %s you entered is invalid.'));
		$this->form_validation->set_error_delimiters('<div class="change-password-wrong mb-5">', '</div>'); 

		if($this->form_validation->run() === TRUE){

			$input = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'semester' => $this->input->post('semester'),
				'birthday' => $this->input->post('bday')
			);
			
			$data['message'] = $this->student_model->update_student($this->input->post('index'), $input);	
		}

		$data['student'] = $this->student_model->get_all_students($index_number)[0];

		$this->load->view('templates/admin_header');
		$this->load->view('admins/edit_student', $data);
		$this->load->view('templates/footer');	
	}

	public function searchStudent() {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$student_id = $this->input->post('search-student');
		$this->viewStudent($student_id);

	}

	public function addTeacher() {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$this->form_validation->set_rules('nic', 'NIC' , 'required|is_unique[lecturer.nic]', array('is_unique' => 'The %s you entered is already exists in the system.'));
		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'LastName', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email|is_unique[lecturer.email]', array('is_unique' => 'The %s you entered is already exists in the system.'));
		$this->form_validation->set_rules('phone', 'Telephone Number', 'required|regex_match[/^[0-9]{10}$/]', array('regex_match' => 'The %s you entered is invalid.'));
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_error_delimiters('<div class="change-password-wrong mb-5">', '</div>'); 

		if($this->form_validation->run() === false){

			$this->load->view('templates/admin_header');
			$this->load->view('admins/add_teacher');
			$this->load->view('templates/footer');	
		}
			
		else{

			$input = array(
				'email' => $this->input->post('email'),
				'nic' => $this->input->post('nic'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'telephone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'birthday' => $this->input->post('bday'),
				'gender' => $this->input->post('gender'),
				'nationality' => $this->input->post('nationality'),
				'status' => '1'
			);

			$signup_data = array(
				'nic' => $this->input->post('nic'), 
				'password' => md5("1234"),
				'status' => '1'
			);
			
			$this->teacher_model->signup_teacher($signup_data);	
			$this->teacher_model->add_teacher($input);	
			$this->index();
		}
	}	

	public function viewTeacher($teacher_id = NULL) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$data['teachers_available'] = "";
		$data['teachers_disable'] = "";

		if ($teacher_id) {
			$data['teachers_available'] = $this->teacher_model->get_teacher($teacher_id);
		} else {
			$data['teachers_available'] = $this->teacher_model->get_available_teacher();
			$data['teachers_disable'] = $this->teacher_model->get_disable_teacher();
		}
		$data['count'] = $this->teacher_model->get_teacher_count();
		
		$this->load->view('templates/admin_header');
		$this->load->view('admins/view_teachers', $data);
		$this->load->view('templates/footer');	
	}

	public function editTeacher($teacher_id) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$data['message'] = "";
		$data['courses'] = "";

		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email');
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_rules('phone', 'Telephone Number', 'required|regex_match[/^[0-9]{10}$/]', array('regex_match' => 'The %s you entered is invalid.'));
		$this->form_validation->set_error_delimiters('<div class="change-password-wrong mb-5">', '</div>'); 

		if($this->form_validation->run() === TRUE){

			$input = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'telephone' => $this->input->post('phone'),
				'birthday' => $this->input->post('bday')
			);
			
			$data['message'] = $this->teacher_model->update_teacher($teacher_id, $input);	
		}

		$data['teacher'] = $this->teacher_model->get_teacher($teacher_id)[0];
		$data['status'] = $this->teacher_model->get_status($teacher_id);
		$data['courses'] =  $this->course_model->get_course_by_lecturer($teacher_id);

		$this->load->view('templates/admin_header');
		$this->load->view('admins/edit_teacher', $data);
		$this->load->view('templates/footer');	
	}

	public function searchTeacher() {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$teacher_id = $this->input->post('search-teacher');
		$this->viewTeacher($teacher_id);

	}

	public function changeStatus($teacher_id, $status) {

		if(!$this->session->userdata('admin_id')){
			redirect('');
		}

		$this->teacher_model->change_status($teacher_id, $status);
		redirect('admin/editTeacher/'.$teacher_id);
	}
}
