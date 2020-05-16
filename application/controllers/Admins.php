<?php
class Admins extends CI_Controller{

	public function index(){

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
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
			redirect('loginAdmin');
		}

		$this->form_validation->set_rules('id', 'Course ID' , 'required');
		$this->form_validation->set_rules('description', 'Description' , 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_error_delimiters('<div class="submission-error mb-5">', '</div>'); 

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
				'lecturer_id' => $this->input->post('teacher'),
				'semester' => $this->input->post('teacher')
			);
			
			$this->course_model->create_course($input);	
			$this->index();
		}
	}

	public function addTeacher() {

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
		}

		$this->form_validation->set_rules('nic', 'NIC' , 'required');
		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'LastName', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Telephone', 'required');
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_error_delimiters('<div class="submission-error mb-5">', '</div>'); 

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
				'nationality' => $this->input->post('nationality')
			);

			$signup_data = array(
				'email' => $this->input->post('email'), 
				'password' => md5("1234")
			);
			
			$this->teacher_model->signup_teacher($signup_data);	
			$this->teacher_model->add_teacher($input);	
			$this->index();
		}
	}	
	
	public function addStudent() {

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
		}

		$this->form_validation->set_rules('index', 'Index Number' , 'required');
		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email');
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		$this->form_validation->set_error_delimiters('<div class="submission-error mb-5">', '</div>'); 

		if($this->form_validation->run() === false){

			$this->load->view('templates/admin_header');
			$this->load->view('admins/add_student');
			$this->load->view('templates/footer');	
		}
			
		else{

			$input = array(
				'indexNumber' => $this->input->post('index'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'semester' => $this->input->post('semester'),
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

	public function viewCourse() {

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
		}

		$data['courses'] = $this->course_model->get_courses();
		$data['count'] = $this->course_model->get_course_count();

		$this->load->view('templates/admin_header');
		$this->load->view('admins/view_courses', $data);
		$this->load->view('templates/footer');	
	}

	public function viewStudent() {

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
		}

		$data['students'] = $this->student_model->get_all_students();
		$data['count'] = $this->student_model->get_student_count();
		
		$this->load->view('templates/admin_header');
		$this->load->view('admins/view_students', $data);
		$this->load->view('templates/footer');	
	}

	public function editStudent($index_number) {

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
		}

		$this->form_validation->set_rules('fname', 'First Name' , 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address' , 'required|valid_email');
		$this->form_validation->set_rules('address', 'Home Address', 'required');
		$this->form_validation->set_rules('bday', 'Birthday', 'required');
		//$this->form_validation->set_rules('phone', 'Telephone Number', 'matches["/^[0-9]{10}/"]', array('matches' => 'The %s you entered is invalid.'));
		$this->form_validation->set_error_delimiters('<div class="submission-error mb-5">', '</div>'); 

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
			
			$this->student_model->update_student($this->input->post('index'), $input);	
		}

		$data['student'] = $this->student_model->get_all_students($index_number);

		$this->load->view('templates/admin_header');
		$this->load->view('admins/edit_student', $data);
		$this->load->view('templates/footer');	
	}

	public function viewTeacher() {

		if(!$this->session->userdata('admin_id')){
			redirect('loginAdmin');
		}

		$data['teachers'] = $this->teacher_model->get_teacher();
		$data['count'] = $this->teacher_model->get_teacher_count();
		
		$this->load->view('templates/admin_header');
		$this->load->view('admins/view_teachers', $data);
		$this->load->view('templates/footer');	
	}
}
