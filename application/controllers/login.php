<?php

class Login extends CI_Controller {

	function index(){

		$this->load->view('Login/Index');
	}

	function loginUser(){

		$data['title'] = 'Login';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() === FALSE){

			$this->load->view('login/index',$data);

		} else {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->input->post('admin-check')) {
				$admin_id = $this->login_model->admin_login($username,$password);
			} else {
				$student = $this->login_model->student_login($username,$password);
				$lecturer = $this->login_model->lecturer_login($username,$password);
			}

			if($student){
				print_r($student);

				if ($student['status'] == '-1') {
					$this->session->set_userdata('student_id', $student['indexNumber']);
					$this->session->set_flashdata('login_success', 'You are logged to the system first time.');
					redirect('changeInitialPassword');
				} else {
					$this->session->set_userdata('student_id', $student['indexNumber']);
					$this->session->set_flashdata('login_success', 'You are now logged in.');
					redirect('student');
				}

			} else if ($lecturer){

				if ($lecturer['status'] == '1') {
					$this->session->set_userdata('lecturer_id', $lecturer['nic']);
					$this->session->set_flashdata('login_success', 'You are now logged in.');
					redirect('teacher');	
				} else if ($lecturer['status'] == '-1') {
					$this->session->set_userdata('lecturer_id', $lecturer['nic']);
					$this->session->set_flashdata('login_success', 'You are logged to the system first time.');
					redirect('changeInitialPassword');
				} else {
					$this->session->set_flashdata('login_failed', 'You have disabled from the system.');
					$this->session->set_flashdata('login_failed_enc_password', $enc_password);
					redirect('');
				}
				
			} else if ($admin_id)  {

				$this->session->set_userdata('admin_id', $admin_id);
				$this->session->set_flashdata('login_success', 'You are now logged in.');
				redirect('admin');

			} else {

				$this->session->set_flashdata('login_failed', 'Login is Invalid.');
				$this->session->set_flashdata('login_failed_enc_password', $enc_password);
				redirect('');

			}
		}
	}

	public function changeInitialPassword() {

		$new_pass = $this->input->post('new_pass');
		$renew_pass = $this->input->post('renew_pass');

		$this->form_validation->set_rules('new_pass', 'New Password' , 'required');
		$this->form_validation->set_rules('renew_pass', 'Re-New Password' , 'required');

		if($this->form_validation->run() === TRUE){

			if ($new_pass == $renew_pass) {
				if ($this->session->userdata('lecturer_id')){
					$this->teacher_model->change_password($this->session->userdata('lecturer_id'), md5($new_pass));
					redirect('teacher');
				} else if ($this->session->userdata('student_id')){
					$this->student_model->change_password($this->session->userdata('student_id'), md5($new_pass));
					redirect('student');
				} else {
					redirect('');
				}
			} else {
				redirect('changeInitialPassword');
			}
		} else {
			$this->load->view('login/change_password');
		}
	}

	function logout(){
		
		$this->session->sess_destroy();
		redirect('');
		
	}
}
