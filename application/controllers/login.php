<?php

class login extends CI_Controller {

	function index(){

		$this->load->view('login/index');

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

			$student_id = $this->login_model->student_login($username,$password);
			$lecturer_id = $this->login_model->lecturer_login($username,$password);


			if($student_id){

				$this->session->set_userdata('student_id', $student_id);
				$this->session->set_flashdata('login_success', 'You are now logged in.');
				redirect('student');

			} else if ($lecturer_id){

				$this->session->set_userdata('lecturer_id', $lecturer_id);
				$this->session->set_flashdata('login_success', 'You are now logged in.');
				redirect('teacher');

			} else {

				$this->session->set_flashdata('login_failed', 'Login is Invalid.');
				$this->session->set_flashdata('login_failed_enc_password', $enc_password);
				redirect('login');

			}
		}

	}

	function logout(){

		
		$this->session->sess_destroy();
		redirect('');
		
	}
}